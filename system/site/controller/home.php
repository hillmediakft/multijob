<?php 
class Home extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('home_model');
	}


	public function index()
	{
		$this->view->head = 'Ez az index header tartalom.';
		$this->view->content = 'Ez a Home tartalom............ Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar.';
		$this->view->foot = 'Ez az index  footer tartalom.';
		
		//$this->view->css_link[] = $this->make_link('css', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
		// az oldalspecifikus javascript linkeket berakjuk a view objektum js_link tulajdonságába (ami egy tömb)
		
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/home.js');

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