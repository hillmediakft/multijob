<?php
class Regisztracio extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('regisztracio_model');
    }

    public function index() {
		
		if(isset($this->registry->params['user_id']) && isset($this->registry->params['user_activation_verification_code'])){
		
			// új regisztráció ellenőrzése
			$result = $this->regisztracio_model->verifyNewUser($this->registry->params['user_id'], $this->registry->params['user_activation_verification_code']);
			
			if($result) {
				$this->view->message = Message::send('account_activation_successful');
			} else {
				$this->view->message = Message::send('account_activation_failed');
			}

			$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
			$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
		
			$this->view->render('regisztracio/tpl_regisztracio', true);

  
		} else {
			Util::redirect('error');
		}
    }
	
	/**
	 *	(AJAX) Felhasználó regisztráció
	 */
	public function ajax_register()
	{
		if(Util::is_ajax()){

			$respond = $this->regisztracio_model->register_user();
			echo $respond;
			exit();

		} else {
			Util::redirect('error');
		}	
	}
	
}
?>