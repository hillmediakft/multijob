<?php 
class Irodak extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('irodak_model');
	}

	public function index()
	{
		$this->view->head = 'Ez az index header tartalom.';
		$this->view->content = 'Ez a Home tartalom............ Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar.';
		$this->view->foot = 'Ez az index  footer tartalom.';
		
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->irodak_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->irodak_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->irodak_model->get_page_data(6); 
		
//$this->view->debug(true); 	

		$this->view->render('irodak/tpl_irodak');				
	}
	
	
}
?>