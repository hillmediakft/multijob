<?php 
class Kollegak extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('kollegak_model');
	}

	public function index(){
		$this->view->head = 'Ez az index header tartalom.';
		$this->view->content = 'Ez a Home tartalom............ Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar.';
		$this->view->foot = 'Ez az index  footer tartalom.';
		
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/kollegak.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->kollegak_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->kollegak_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->kollegak_model->get_page_data(5); 
		
//$this->view->debug(true); 	

		$this->view->render('kollegak/tpl_kollegak');				
	}
	
	
}
?>