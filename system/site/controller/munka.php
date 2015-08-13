<?php 
class Munka extends Controller {

	function __construct()
	{
		parent::__construct();
        Auth::handleExpire();
		$this->loadModel('munka_model');
	}

	public function index()
	{
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

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