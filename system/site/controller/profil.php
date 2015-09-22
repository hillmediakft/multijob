<?php

class Profil extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleExpire();
        $this->loadModel('profil_model');
    }

    public function index() {
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->profil_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->profil_model->jobs_query(3);
        
        $this->view->title = "Felhasználói profil";
        $this->view->description = "Profil";
        $this->view->keywords = "profil";
        

//$this->view->debug(true); 	

        $this->view->render('profil/tpl_profil');
    }

}

?>