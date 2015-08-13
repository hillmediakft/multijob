<?php
class Cegek extends Controller {
    
    function __construct()
	{
		parent::__construct();
        Auth::handleExpire();
		$this->loadModel('cegek_model');
	}

    
    public function index()
    {
        Util::redirect('error');    
    }

    
    public function cegbemutato()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
        
        // 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(7); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_cegbemutato');
    }
    
    
    public function munkaero_kolcsonzes()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(8); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_munkaero_kolcsonzes');
    }
    
    public function rehabilitacios_uzletag()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(9); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_rehabilitacios_uzletag');
    }
    
    public function referenciak()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(10); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_referenciak');
    }
    
    public function szolgaltatasaink()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(11); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_szolgaltatasaink');
    }
    
    public function szemelyzeti_tanacsadas()
    {
       	$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
		$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

		// alapbeállítások lekérdezése
		$this->view->settings = $this->cegek_model->get_settings();
		// 3 legfrissebb munka
		$this->view->latest_jobs = $this->cegek_model->jobs_query(3);
		// oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
		$this->view->content = $this->cegek_model->get_page_data(12); 
		
//$this->view->debug(true); 	

		$this->view->render('cegek/tpl_szemelyzeti_tanacsadas');
    }
    


}
?>