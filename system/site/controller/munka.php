<?php 
class Munka extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('munka_model');
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
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/munka.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->munka_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->munka_model->jobs_query(3);
		// munka adatok lekérdezése
		$this->view->job_data = $this->munka_model->get_job($this->registry->params['munka_id']);
		
//$this->view->debug(true); 	

		$this->view->render('munka/tpl_munka');	
	}

	
}	
?>