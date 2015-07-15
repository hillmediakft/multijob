<?php 

class users extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('user_model');
	}


	/**
	 *	Ne legyen 'sima' user oldal
	 */
	public function index()
	{
		Util::redirect('error');
	}


	/**
	 *	Felhasználó bejelentkezés
	 *
	 */
	public function ajax_login()
	{
		if(Util::is_ajax()){

			$respond = $this->user_model->login();
			echo $respond;
			exit();

		} else {
			Util::redirect('error');
		}

	
/*	
		// ha elküldték a POST adatokat
		if(isset($_POST['login_site_user'])) {
			// perform the login method, put result (true or false) into $login_successful
			$login_successful = $this->user_model->login();

	
			// check login status
			if ($login_successful) {
				// if YES, then move user to /admin (btw this is a browser-redirection, not a rendered view!)
				header('location: ' . BASE_URL);
				exit;
			} else {
				// if NO, then move user to /users/login (login form) again
				header('location: ' . BASE_URL . 'users/login');
				exit;
			}
		}	


		$this->view->render('users/tpl_login_site');
*/			
	}
	

    /**
     * The logout action, users/logout
     */
    function logout()
    {
        $this->user_model->logout();
        // redirect user to base URL
		header('location: ' . BASE_URL);
		exit;
    }	


    /**
     * Request password reset page
     */
    public function requestPasswordReset()
    {
		//ha a form el lett küldve
		if(isset($_POST['request_password_reset'])) {
			$this->user_model->requestPasswordReset();
			header('location:' . BASE_URL . 'users/register');
			exit;
		}
		
		// ha nincs még kitöltve és elküldve a form 
        $this->view->render('users/tpl_requestpasswordreset');
    }


    /**
     * Verify the verification token of that user (to show the user the password editing view or not)
     * @param string $user_name username
     * @param string $verification_code password reset verification token
     */
    public function verifyPasswordReset()
    {
        if ($this->user_model->verifyPasswordReset($this->registry->params['user_name'], $this->registry->params['verification_code'])) {
            // get variables for the view
            $this->view->user_name = $this->registry->params['user_name'];
            $this->view->user_password_reset_hash = $this->registry->params['verification_code'];
			$this->view->render('users/tpl_changepassword');
        } else {
            header('location: ' . BASE_URL . 'users/login');
        }
    }

    /**
     * Set the new password
     */
    public function setNewPassword()
    {
        // try the password reset (user identified via hidden form inputs ($user_name, $verification_code)), see
        // verifyPasswordReset() for more
        $this->user_model->setNewPassword();
        // regardless of result: go to index page (user will get success/error result via feedback message)
        header('location: ' . BASE_URL . 'users/register');
    }	
}
?>