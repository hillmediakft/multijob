<?php
class Feliratkozas extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('feliratkozas_model');
    }

	/**
	 *	Feliratkozás visszaigazolás
	 *
	 */
    public function index() {
		
		if(isset($this->registry->params['user_id']) && isset($this->registry->params['user_activation_verification_code'])){
		
			// új feliratkozas ellenőrzése
			$result = $this->feliratkozas_model->verifyNewUser($this->registry->params['user_id'], $this->registry->params['user_activation_verification_code']);
			
			if($result) {
				$this->view->message = Message::send('A feliratkozás sikerült!');
			} else {
				$this->view->message = Message::send('A feliratkozás nem sikerült!');
			}


			$this->view->settings = $this->feliratkozas_model->get_settings(); 
			
			$this->view->render('feliratkozas/tpl_feliratkozas', true);
			
		} else {
			Util::redirect('error');
		}	
			
    }
	
	
	/**
	 *	(AJAX) Hírlevélre feliratkozás
	 */
	public function ajax_subscribe()
	{
		if(Util::is_ajax()){

			$respond = $this->feliratkozas_model->subscribe_user();
			echo $respond;
			exit();

		} else {
			Util::redirect('error');
		}	
	}	

}
?>