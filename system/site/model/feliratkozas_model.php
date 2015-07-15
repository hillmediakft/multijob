<?php 
class feliratkozas_model extends Model {

	/**
     * Constructor, létrehozza az adatbáziskapcsolatot
     */
	function __construct()
	{
		parent::__construct();
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

		// E-mail ellenőrzés
		if (empty($data['user_email'])) {
			$messages[] = Message::send('email_field_empty');
		} else {
			if (strlen($data['user_email']) > 64) {
				$messages[] = Message::send('email_too_long');
			}
			if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL)) {
				$messages[] = Message::send('email_does_not_fit_pattern');
			}
		}

		if (empty($messages)) {
	
			// lekérdezzük, hogy létezik-e már ilyen e-mail cím
			$this->query->reset();
			$this->query->set_table(array('site_users'));
			$this->query->set_columns('user_id');
			$this->query->set_where('user_email', '=', $data['user_email']);
			$result = $this->query->select();
            if (count($result) == 1) {
                $messages[] = Message::send('user_email_already_taken');
            }			
			
			if(empty($messages)){
				// ha nincs semmilyen hiba
				return true;
			
			} else {
				//hibaüzeneteket tartalmazó tömb
				return $messages;
			}
		} else {
			//hibaüzeneteket tartalmazó tömb
			return $messages;
		}
	}	
	

	/**
	 *	új felhasználó regisztrálása a site_users táblába
	 *	(hírlevélre feliratkozás!!)
	 */
	public function subscribe_user()
	{
		// ellenőrzi a usertől kapott adatokat
		$verify_result = $this->verify_user_data($_POST);
		
		// ha a verify_user_data() metódus TRUE-t ad vissza	nincs hiba
		if ($verify_result === true) {

			$data = $_POST;
			
			$success_messages = array();
			$error_messages = array();
	
			// Ha egy robot töltötte ki a formrot
			/*
			if($data['security_name'] != ''){
				return false;
			}
			unset($data['security_name']);
			*/
			
			// a felhasználó neve az email címe lesz
			//$data['user_name'] = $data['user_email'];
			//$data['user_name'] = null;
						
 			// beállítjuk, hogy kér hírlevelet
			$data['user_newsletter'] = 1;
			// generálunk egy kódot ami majd a hírlevélről leiratkozáshoz kell (40 char string)
			$data['user_unsubscribe_code'] = sha1(uniqid(mt_rand(), true));
			// generálunk egy ellenőrző kódot a regisztráció email-es ellenőrzéshez (40 char string)
			$data['user_activation_hash'] = sha1(uniqid(mt_rand(), true));
			// a user_active alapállapotban 0 lesz (vagyis inaktív)
			$data['user_active'] = 0;
			//felhasználó hatásköre
			$data['user_role_id'] = 3;
            // generate integer-timestamp for saving of account-creating date
            $data['user_creation_timestamp'] = time();
			//a felhasználó "típusa" (csak hírlevélre feliratkozóknek: news_only)
			$data['user_provider_type'] = 'news_only';

			$this->query->reset();
			$this->query->set_table(array('site_users'));
			$user_id = $this->query->insert($data);
			
			if (!$user_id) {
                $message = Message::send('A feliratkozás nem sikerült!');
				return json_encode(array(
					"status" => 'error',
					"message" => $message
				));
			}
			

		// ellenőrző email küldése, (ha az ellenőrző email küldése sikertelen: töröljük a user adatait az adatbázisból)
			if ($this->sendVerificationEmail('', $user_id, $data['user_email'], $data['user_activation_hash'])) {
				
				$messages[] = Message::send('A feliratkozás sikerült.');
				$messages[] = Message::send('verification_mail_sending_successful');
				$messages[] = Message::send('Please click the VERIFICATION LINK within that mail.');
				
				return json_encode(array(
					"status" => 'success',
					"message" => $messages
				));
			} else {
				$this->query->reset();
				$this->query->set_table(array('site_users'));
				$this->query->delete('user_id', '=', $user_id);
				$message = Message::send('verification_mail_sending_failed');
				
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
     * sends an email to the provided email address
	 *
     * @param string 	$user_name 					felhasznalo neve
     * @param int 		$user_id 					user's id
     * @param string 	$user_email 				user's email
     * @param string 	$user_activation_hash 		user's mail verification hash string

     * @return boolean
     */
    private function sendVerificationEmail($user_name, $user_id, $user_email, $user_activation_hash)
    {
		// Email kezelő osztály behívása
		include(LIBS . '/simple_mail_class.php');
	
		$subject = Config::get('email.verification_newsletter.subject');
		$link = Config::get('email.verification_newsletter.link');
		$html = '<html><body><h3>Tisztelt felhasználó!</h3><p>Ön a ' . $user_email . ' e-mail címmel feliratkozott a hírlevelünkre.</p><a href="' . BASE_URL . 'feliratkozas/' . $user_id . '/' . $user_activation_hash . '">' . $link . '</a></body></html>';
		
		$from_email = Config::get('email.from_email');
		$from_name = Config::get('email.from_name');
		
        // Létrehozzuk a SimpleMail objektumot
		$mail = new SimpleMail();
		$mail->setTo($user_email, '')
			 ->setSubject($subject)
			 ->setFrom($from_email, $from_name)
			 ->addMailHeader('Reply-To', 'info@gmail.com', 'Mail Bot')
			 ->addGenericHeader('MIME-Version', '1.0')
			 ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
			 ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
			 ->setMessage($html)
			 ->setWrap(78);
  
        // final sending and check
        if($mail->send()) {
            return true;
        } else {
            return false;
        }
    }

	

    /**
     * checks the email/verification code combination and set the user's activation status to true in the database
     * @param int $user_id user id
     * @param string $user_activation_verification_code verification token
     * @return bool success status
     */
    public function verifyNewUser($user_id, $user_activation_verification_code)
    {
		// megnézzük, hogy már sikerült-e a feliratkozás (ha frissíti az oldalt)
		$this->query->reset();
		$this->query->set_table(array('site_users'));
		$this->query->set_columns(array('user_id'));
		$this->query->set_where('user_id', '=', $user_id);
		$this->query->set_where('user_active', '=', 1, 'and');
		$this->query->set_where('user_activation_hash', '=', null, 'and');
		$this->query->set_where('user_newsletter', '=', 1, 'and');

		$result = $this->query->select();
		if($result){
			return true;
		}
	
		$data['user_active'] = 1;
		$data['user_activation_hash'] = null;
		
		$this->query->reset();
		$this->query->set_table(array('site_users'));
		$this->query->set_where('user_id', '=', $user_id);
		$this->query->set_where('user_activation_hash', '=', $user_activation_verification_code, 'and');
		$result = $this->query->update($data);
		
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

	
	
}
?>