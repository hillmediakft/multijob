<?php
class Eloregisztracio extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('eloregisztracio_model');
    }

	
	public function index()
	{
		if(!empty($_POST)){
			$result = $this->eloregisztracio_model->pre_register();	
			
			if($result){
				Util::redirect('home');
			} else {
				Util::redirect('eloregisztracio');
			}
		
		}
		
		$this->view->head = 'Ez az index header tartalom.';
		$this->view->content = 'Ez a Home tartalom............ Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar.';
		$this->view->foot = 'Ez az index  footer tartalom.';

		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
		//$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/eloregisztracio.js');
		
		// alapbeállítások lekérdezése
		$this->view->settings = $this->eloregisztracio_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->eloregisztracio_model->jobs_query(3);		
		
//$this->view->debug(true); 
		
		$this->view->render('eloregisztracio/tpl_eloregisztracio');
	}	
	
	
	/**
	 *	(AJAX) Felhasználó regisztráció
	 */
/*
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
*/	
}
?>