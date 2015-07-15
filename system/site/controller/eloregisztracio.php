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
		
		//$this->view->css_link[] = $this->make_link('css', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
		// az oldalspecifikus javascript linkeket berakjuk a view objektum js_link tulajdonságába (ami egy tömb)
		
		//$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
		//$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');

		//$this->view->sliders = $this->home_model->slider_query(); 
		//$this->view->jobs_data = $this->home_model->jobs_query(); 

		
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