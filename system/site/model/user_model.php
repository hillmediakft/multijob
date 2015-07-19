<?php 

class user_model extends Site_model {

	function __construct()
	{
		parent::__construct();
	}
	
	function __destruct()
	{
		parent::__destruct();
	}	

	/**
	 *	Felhasználók listája (lekérdezés)
	 *
	 */
	public function site_users_query()
	{
		$this->query->reset();
		$this->query->set_table(array('site_users'));
		$this->query->set_columns(array('user_id', 'user_name', 'user_email', 'user_active', 'user_newsletter'));
		//$this->query->set_where('user_active', '=', 1);
		$result = $this->query->select();
	
		return $result;
	}

	/**
	 *	Ellenőrzi a felhasználótól kapott adatokat
	 *	
	 *	@param	array	$data
	 *	@return	bool
	 */	
	private function verify_user_data($data)
	{
		$messages = array();
	
		// User név ellenőrzés
		if (empty($data['user_name'])) {
			$messages[] = Message::send('username_field_empty');
		} else {
			if (!preg_match('/^[\_a-záöőüűóúéíÁÖŐÜŰÓÚÉÍ\d]{2,64}$/i', $data['user_name'])) {
				$messages[] = Message::send('username_does_not_fit_pattern');
			}	
		}
		// Jelszó ellenőrzés
		if (empty($data['user_password'])) {
			$messages[] = Message::send('password_field_empty');
		}

		if (empty($messages)) {
			return true;
		} else {
			//hibaüzeneteket tartalmazó tömb
			return $messages;
		}
	}
	
	
    /**
     * Login process (for DEFAULT user accounts).
     * Users who login with Facebook etc. are handled with loginWithFacebook()
     * @return bool success state
     */
    public function login()
    {
		// ha már be van jelentkezve
		if(isset($_SESSION['user_site_logged_in']) && ($_SESSION['user_site_logged_in'] === true)){
			$message[] = Message::send('Ön már be van jelentkezve.');
			return json_encode(array(
				"status" => 'error',
				"message" => $message
			));
		}
		
	
		$verify_result = $this->verify_user_data($_POST);
	
		if($verify_result === true){
		
		    // get user's data
			// (we check if the password fits the password_hash via password_verify() some lines below)
			$sth = $this->connect->prepare("SELECT user_id,
											  user_name,
											  user_email,
											  user_password_hash,
											  user_active,
											  user_role_id,
											  user_failed_logins,
											  user_last_failed_login
									   FROM   site_users
									   WHERE  (user_name = :user_name OR user_email = :user_name)
											  AND user_provider_type = :provider_type");
			// DEFAULT is the marker for "normal" accounts (that have a password etc.)
			// There are other types of accounts that don't have passwords etc. (FACEBOOK)
			$sth->execute(array(':user_name' => $_POST['user_name'], ':provider_type' => 'default'));
			$count =  $sth->rowCount();
			// if there's NOT one result
			
			if ($count != 1) {
				// was USER_DOES_NOT_EXIST before, but has changed to LOGIN_FAILED
				// to prevent potential attackers showing if the user exists
				$message[] = Message::send('login_failed');
				return json_encode(array(
					"status" => 'error',
					"message" => $message
				));				
			}

			// fetch one row (we only have one result)
			$result = $sth->fetch(PDO::FETCH_OBJ);
			
			// block login attempt if somebody has already failed 3 times and the last login attempt is less than 30sec ago
			if (($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time()-30))) {
				
				$message[] = Message::send('password_wrong_3_times');
				return json_encode(array(
					"status" => 'error',
					"message" => $message
				));				
				
			}
			// check if hash of provided password matches the hash in the database
			if (password_verify($_POST['user_password'], $result->user_password_hash)) {

				// HA MÉG NINCS EMAILEN AKTIVÁLVA (a user_active -nak 1-nek lennie) 		
				if ($result->user_active != 1) {
					$message[] = Message::send('account_not_activated_yet');
					return json_encode(array(
						"status" => 'error',
						"message" => $message
					));	
				}
				

				// login process, write the user data into session
				Session::init();
				Session::set('user_site_logged_in', true);
				Session::set('user_site_id', $result->user_id);
				Session::set('user_site_name', $result->user_name);
				Session::set('user_site_email', $result->user_email);
				Session::set('user_site_role_id', $result->user_role_id);
				Session::set('user_site_provider_type', 'default');
				

				// reset the failed login counter for that user (if necessary)
				if ($result->user_last_failed_login > 0) {
					$sql = "UPDATE site_users SET user_failed_logins = 0, user_last_failed_login = NULL
							WHERE user_id = :user_id AND user_failed_logins != 0";
					$sth = $this->connect->prepare($sql);
					$sth->execute(array(':user_id' => $result->user_id));
				}

				// generate integer-timestamp for saving of last-login date
				$user_last_login_timestamp = time();
				// write timestamp of this login into database (we only write "real" logins via login form into the
				// database, not the session-login on every page request
				$sql = "UPDATE site_users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
				$sth = $this->connect->prepare($sql);
				$sth->execute(array(':user_id' => $result->user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

				// if user has checked the "remember me" checkbox, then write cookie
				if (isset($_POST['user_rememberme'])) {

					// generate 64 char random string
					$random_token_string = hash('sha256', mt_rand());

					// write that token into database
					$sql = "UPDATE site_users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
					$sth = $this->connect->prepare($sql);
					$sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));

					// generate cookie string that consists of user id, random string and combined hash of both
					$cookie_string_first_part = $result->user_id . ':' . $random_token_string;
					$cookie_string_hash = hash('sha256', $cookie_string_first_part);
					$cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

					// set cookie
					setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
				}
	
				// return true to make clear the login was successful
				return json_encode(array(
					"status" => 'logged_in'
				));	

			} else {
				// increment the failed login counter for that user
				$sql = "UPDATE site_users
						SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login
						WHERE user_name = :user_name OR user_email = :user_name";
				$sth = $this->connect->prepare($sql);
				$sth->execute(array(':user_name' => $_POST['user_name'], ':user_last_failed_login' => time() ));

				// feedback message
				$message[] = Message::send('password_wrong');
				return json_encode(array(
					"status" => 'error',
					"message" => $message
				));	
	
			}		
		
		} else {
			// ha valamilyen hiba volt a form adataiban
			return json_encode(array(
				"status" => 'error',
				"message" => $verify_result
			));		
		}
    }

	
    /**
     * Log out process, deletes cookie, deletes session
     */
    public function logout()
    {
        // set the remember-me-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/');

        // delete the session
        Session::destroy();
    }
	

    /**
     * Perform the necessary actions to send a password reset mail
     * @return bool success status
     */
    public function requestPasswordReset()
    {
        if (!isset($_POST['user_name']) OR empty($_POST['user_name'])) {
            Message::set('error', 'username_field_empty');
            return false;
        }

        // generate integer-timestamp (to see when exactly the user (or an attacker) requested the password reset mail)
        $temporary_timestamp = time();
        // generate random hash for email password reset verification (40 char string)
        $user_password_reset_hash = sha1(uniqid(mt_rand(), true));
        // clean user input
        $user_name = $_POST['user_name'];

        // check if that username exists
        $query = $this->connect->prepare("SELECT user_id, user_email FROM site_users
                                     WHERE user_name = :user_name AND user_provider_type = :provider_type");
        $query->execute(array(':user_name' => $user_name, ':provider_type' => 'default'));
        $count = $query->rowCount();
        if ($count != 1) {
            Message::set('error', 'user_does_not_exist');
            return false;
        }

        // get result
        $result_user_row = $result = $query->fetch(PDO::FETCH_OBJ);
        $user_email = $result_user_row->user_email;

        // set token (= a random hash string and a timestamp) into database
		// beír az adatbázisba egy user_password_reset_hash-t és egy user_password_reset_timestamp-et
        if ($this->setPasswordResetDatabaseToken($user_name, $user_password_reset_hash, $temporary_timestamp) == true) {
            // send a mail to the user, containing a link with username and token hash string
            if ($this->sendPasswordResetMail($user_name, $user_password_reset_hash, $user_email)) {
                return true;
            }
        }
        // default return
        return false;
    }

    /**
     * Set password reset token in database (for DEFAULT user accounts)
     * @param string $user_name username
     * @param string $user_password_reset_hash password reset hash
     * @param int $temporary_timestamp timestamp
     * @return bool success status
     */
    public function setPasswordResetDatabaseToken($user_name, $user_password_reset_hash, $temporary_timestamp)
    {
        $query_two = $this->connect->prepare("UPDATE site_users
                                            SET user_password_reset_hash = :user_password_reset_hash,
                                                user_password_reset_timestamp = :user_password_reset_timestamp
                                          WHERE user_name = :user_name AND user_provider_type = :provider_type");
        $query_two->execute(array(':user_password_reset_hash' => $user_password_reset_hash,
                                  ':user_password_reset_timestamp' => $temporary_timestamp,
                                  ':user_name' => $user_name,
                                  ':provider_type' => 'default'));

        // check if exactly one row was successfully changed
        $count =  $query_two->rowCount();
        if ($count == 1) {
            return true;
        } else {
            Message::set('error', 'password_reset_token_fail');
            return false;
        }
    }

    /**
     * send the password reset mail
     * @param string $user_name username
     * @param string $user_password_reset_hash password reset hash
     * @param string $user_email user email
     * @return bool success status
     */
    public function sendPasswordResetMail($user_name, $user_password_reset_hash, $user_email)
    {
		// Email kezelő osztály behívása
		include(LIBS . '/simple_mail_class.php');
	
        // Létrehozzuk a SimpleMail objektumot
		$mail = new SimpleMail();
		$mail->setTo($user_email, 'Recipient 1')
			 ->setSubject(Config::get('email.password_reset.subject'))
			 ->setFrom(Config::get('email.password_reset.from_email'), Config::get('email.password_reset.from_name'))
			 ->addMailHeader('Reply-To', 'sender@gmail.com', 'Mail Bot')
			 ->addGenericHeader('MIME-Version', '1.0')
			 ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
			 ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
			 ->setMessage('<html><body><a href="' . Config::get('email.password_reset.site_url') . '/' . urlencode($user_name) . '/' . urlencode($user_password_reset_hash) . '">' . Config::get('email.password_reset.content') . '</a></body></html>')
			 ->setWrap(78);	
	
      // send the mail
        if($mail->send()) {
            Message::set('success', 'password_reset_mail_sending_successful');
            return true;
        } else {
            Message::set('error', 'password_reset_mail_sending_error');
            return false;
        }
    }

    /**
     * Verifies the password reset request via the verification hash token (that's only valid for one hour)
     * @param string $user_name Username
     * @param string $verification_code Hash token
     * @return bool Success status
     */
    public function verifyPasswordReset($user_name, $verification_code)
    {
        // check if user-provided username + verification code combination exists
        $query = $this->connect->prepare("SELECT user_id, user_password_reset_timestamp
                                       FROM site_users
                                      WHERE user_name = :user_name
                                        AND user_password_reset_hash = :user_password_reset_hash
                                        AND user_provider_type = :user_provider_type");
        $query->execute(array(':user_password_reset_hash' => $verification_code,
                              ':user_name' => $user_name,
                              ':user_provider_type' => 'default'));

        // if this user with exactly this verification hash code exists
        if ($query->rowCount() != 1) {
            Message::set('error', 'password_reset_combination_does_not_exist');
            return false;
        }

        // get result row (as an object)
        $result_user_row = $query->fetch(PDO::FETCH_OBJ);
        // 3600 seconds are 1 hour
        $timestamp_one_hour_ago = time() - 3600;
        // if password reset request was sent within the last hour (this timeout is for security reasons)
        if ($result_user_row->user_password_reset_timestamp > $timestamp_one_hour_ago) {
            // verification was successful
            Message::set('success', 'password_reset_link_valid');
            return true;
        } else {
            Message::set('error', 'password_reset_link_expired');
            return false;
        }
    }

	
	
	
	
	
	
	
	
    /**
     * Set the new password (for DEFAULT user, FACEBOOK-users don't have a password)
     * Please note: At this point the user has already pre-verified via verifyPasswordReset() (within one hour),
     * so we don't need to check again for the 60min-limit here. In this method we authenticate
     * via username & password-reset-hash from (hidden) form fields.
     * @return bool success state of the password reset
     */
    public function setNewPassword()
    {
        // basic checks
        if (!isset($_POST['user_name']) OR empty($_POST['user_name'])) {
            Message::set('error', 'username_field_empty');
            return false;
        }
        if (!isset($_POST['user_password_reset_hash']) OR empty($_POST['user_password_reset_hash'])) {
            Message::set('error', 'password_reset_token_missing');
            return false;
        }
        if (!isset($_POST['user_password_new']) OR empty($_POST['user_password_new'])) {
            Message::set('error', 'password_field_empty');
            return false;
        }
        if (!isset($_POST['user_password_repeat']) OR empty($_POST['user_password_repeat'])) {
            Message::set('error', 'password_field_empty');
            return false;
        }
        // password does not match password repeat
        if ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            Message::set('error', 'password_repeat_wrong');
            return false;
        }
        // password too short
        if (strlen($_POST['user_password_new']) < 6) {
            Message::set('error', 'password_too_short');
            return false;
        }

        // check if we have a constant HASH_COST_FACTOR defined
        // if so: put the value into $hash_cost_factor, if not, make $hash_cost_factor = null
		$hash_cost_factor = (Config::get('hash_cost_factor') !== null) ? Config::get('hash_cost_factor') : null;
		
		
        // crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
        // the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
        // compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
        // want the parameter: as an array with, currently only used with 'cost' => XX.
        $user_password_hash = password_hash($_POST['user_password_new'], PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));

        // write users new password hash into database, reset user_password_reset_hash
        $query = $this->connect->prepare("UPDATE site_users
                                        SET user_password_hash = :user_password_hash,
                                            user_password_reset_hash = NULL,
                                            user_password_reset_timestamp = NULL
                                      WHERE user_name = :user_name
                                        AND user_password_reset_hash = :user_password_reset_hash
                                        AND user_provider_type = :user_provider_type");

        $query->execute(array(':user_password_hash' => $user_password_hash,
                              ':user_name' => $_POST['user_name'],
                              ':user_password_reset_hash' => $_POST['user_password_reset_hash'],
                              ':user_provider_type' => 'default'));

        // check if exactly one row was successfully changed:
        if ($query->rowCount() == 1) {
            // successful password change!
            Message::set('success', 'password_change_successful');
            return true;
        }

        // default return
        Message::set('error', 'password_change_failed');
        return false;
    }








	
	
    /**
     * performs the login via cookie (for DEFAULT user account, FACEBOOK-accounts are handled differently)
     * @return bool success state
     */
    public function loginWithCookie()
    {
        $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';

        // do we have a cookie var ?
        if (!$cookie) {
            Message::set('error', 'cookie_invalid');
            return false;
        }

        // check cookie's contents, check if cookie contents belong together
        list ($user_id, $token, $hash) = explode(':', $cookie);
        if ($hash !== hash('sha256', $user_id . ':' . $token)) {
            Message::set('error', 'cookie_invalid');
            return false;
        }

        // do not log in when token is empty
        if (empty($token)) {
            Message::set('error', 'cookie_invalid');
            return false;
        }

        // get real token from database (and all other data)
        $query = $this->connect->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,
                                          user_role_id,  user_has_avatar, user_failed_logins, user_last_failed_login
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_rememberme_token = :user_rememberme_token
                                       AND user_rememberme_token IS NOT NULL
                                       AND user_provider_type = :provider_type");
        $query->execute(array(':user_id' => $user_id, ':user_rememberme_token' => $token, ':provider_type' => 'default'));
        $count =  $query->rowCount();
        if ($count == 1) {
            // fetch one row (we only have one result)
            $result = $query->fetch(PDO::FETCH_OBJ);
            // TODO: this block is same/similar to the one from login(), maybe we should put this in a method
            // write data into session
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', $result->user_id);
            Session::set('user_name', $result->user_name);
            Session::set('user_email', $result->user_email);
            Session::set('user_role_id', $result->user_role_id);
            Session::set('user_provider_type', 'default');
            

            // generate integer-timestamp for saving of last-login date
            $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
            $sth = $this->connect->prepare($sql);
            $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

            // NOTE: we don't set another rememberme-cookie here as the current cookie should always
            // be invalid after a certain amount of time, so the user has to login with username/password
            // again from time to time. This is good and safe ! ;)
            Message::set('success', 'cookie_login_successful');
            return true;
        } else {
            Message::set('error', 'cookie_invalid');
            return false;
        }
    }


    /**
     * Gets the last page the user visited
     * writeUrlCookie() in libs/Application.php writes the URL of the user's page location into the cookie at every
     * page request. This is useful to redirect the user (after login via cookie) back to the last seen page before
     * his/her session expired or he/she closed the browser
     * @return string view/location the user visited
     */
    public function getCookieUrl()
    {
        $url = '';
        if (!empty($_COOKIE['lastvisitedpage'])) {
            $url = $_COOKIE['lastvisitedpage'];
        }
        return $url;
    }

     /**
     * Deletes the (invalid) remember-cookie to prevent infinitive login loops
     */
    public function deleteCookie()
    {
        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/');
    }

    /**
     * Returns the current state of the user's login
     * @return bool user's login status
     */
    public function isUserLoggedIn()
    {
        return Session::get('user_site_logged_in');
    }

}
?>