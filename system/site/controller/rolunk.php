<?php 
class Rolunk extends Controller {

	function __construct()
	{
		parent::__construct();
        Auth::handleExpire();
		$this->loadModel('rolunk_model');
	}

	public function index()
	{
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->rolunk_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->rolunk_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->rolunk_model->get_page_data(1); 
		
//$this->view->debug(true); 	

		$this->view->render('rolunk/tpl_rolunk');			
	}
	
}
?>