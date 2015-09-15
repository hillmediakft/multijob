<?php

class Kapcsolat extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleExpire();
        $this->loadModel('kapcsolat_model');
    }

    public function index() {
        
        $this->view->js_link[] = $this->make_link('js', 'http://maps.google.com/maps/api/js?sensor=true', '');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/kapcsolat.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->kapcsolat_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->kapcsolat_model->jobs_query(3);
        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->kapcsolat_model->get_page_data(13);
        // Iroda adatok lejérdezése
        $this->view->offices = $this->kapcsolat_model->offices_data_query();

//$this->view->debug(true); 	

        $this->view->render('kapcsolat/tpl_kapcsolat');
    }

}

?>