<?php 
class Home extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('home_model');
	}


	public function index()
	{
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

	// lekérdezések
		$this->view->settings = $this->home_model->get_settings(); 
		$this->view->sliders = $this->home_model->slider_query(); 
		// legújabb munkák
		$this->view->latest_jobs = $this->home_model->jobs_query(9); 
		
//$this->view->debug(true); 

		$this->view->render('home/tpl_home');
	}
	
	
}
?>