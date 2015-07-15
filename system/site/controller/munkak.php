<?php 
class Munkak extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('munkak_model');
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
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/munkak.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->munkak_model->get_settings();

		
		include(LIBS . '/pagine_class.php');
		// paginátor objektum létrehozása (paraméter neve, limit)
		$pagine = new Paginator('oldal', 3);
		
		// szűrési feltételeknek megfelelő összes rekord száma
		$filter_count = $this->munkak_model->jobs_filter_count_query();
		$pagine->set_total($filter_count);
		
		// adatok lekérdezése limittel
		$this->view->jobs_data = $this->munkak_model->jobs_query( $pagine->get_limit(), $pagine->get_offset() ); 
		
		//var_dump($this->registry);

		// lapozó linkek (2 paraméter: uri_path, query_string)
		$this->view->pagine_links = $pagine->page_links($this->registry->uri_path, $this->registry->query_string);
	
//$this->view->debug(true); 
	
		$this->view->render('munkak/tpl_munkak');	
	}

	
}	
?>