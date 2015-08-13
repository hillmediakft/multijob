<?php 
class Feltetelek extends Controller {

	function __construct()
	{
		parent::__construct();
        Auth::handleExpire();
		$this->loadModel('feltetelek_model');
	}

	public function index(){
		Util::redirect('error');			
	}
	
	public function kilepes()
	{
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->feltetelek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->feltetelek_model->get_page_data(3); 
		
//$this->view->debug(true); 	

		$this->view->render('feltetelek/tpl_feltetelek_kilepes');			
	}
	
    public function munkavallalas()
	{
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->feltetelek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->feltetelek_model->get_page_data(2); 
		
//$this->view->debug(true); 	

		$this->view->render('feltetelek/tpl_feltetelek_munkavallalas');	
	}

	public function kifizetes()
	{
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->feltetelek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->feltetelek_model->get_page_data(4); 
		
//$this->view->debug(true); 	

		$this->view->render('feltetelek/tpl_feltetelek_kifizetes');	
	}
	
}
?>