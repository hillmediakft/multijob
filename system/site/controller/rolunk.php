<?php 
class Rolunk extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('rolunk_model');
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
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/rolunk.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->rolunk_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->rolunk_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pagees tábla page_id)
		$this->view->content = $this->rolunk_model->get_page_data(1); 
		
//$this->view->debug(true); 	

		$this->view->render('rolunk/tpl_rolunk');			
	}
	
}
?>