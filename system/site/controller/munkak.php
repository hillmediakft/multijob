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

 
		$this->view->settings = $this->munkak_model->get_settings();
		//$this->view->jobs_data = $this->munkak_model->jobs_query(); 

		
		include(LIBS . '/pagine_class.php');
		$pagine = new Paginator('oldal', 3);
		// összes rekord számának beállítása
		//$pagine->set_total($this->munkak_model->get_count());
		// adatok lekérdezése (a limit és start megadásával)
		
			/*
			$config = array(
				'limit' => $pagine->get_limit(),
				'offset' => $pagine->get_offset(),
				'orderby' => array(),
			);
			*/
		
		//var_dump($_GET);	
		//var_dump($_SERVER['QUERY_STRING']);	
		//var_dump($this->registry->query_string);	
		//exit;	
			
		
		
		$filter_count = $this->munkak_model->jobs_filter_count_query();
		$pagine->set_total($filter_count);
		
		$this->view->jobs_data = $this->munkak_model->jobs_query( $pagine->get_limit(), $pagine->get_offset() ); 
		
		//$pagine->set_record_filtered($filter_count);
		
		
		if(!empty($this->registry->query_string)){
			$query_str = 'munkak?' . $this->registry->query_string . '&';
		} else {
			$query_str = 'munkak?'; 
		}
		
		
		// lapozó linkek
		$this->view->pagine_links = $pagine->page_links($query_str);
	
//$this->view->debug(true); 
	
		$this->view->render('munkak/tpl_munkak');	
	}

	public function kereses()
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

		$this->view->settings = $this->munkak_model->get_settings();
		$this->view->jobs_data = $this->munkak_model->jobs_query(9); 

		
//$this->view->debug(true); 
	
		
		
		$this->view->render('munkak/tpl_munkak');
	}
	
	
}	
?>