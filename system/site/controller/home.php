<?php

class Home extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleExpire();
        $this->loadModel('home_model');
    }

    public function index() {
        
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/iosslider/_src/jquery.iosslider.min.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        //$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/home.js');
        // lekérdezések
        $this->view->settings = $this->home_model->get_settings();
        $this->view->sliders = $this->home_model->slider_query();
        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->home_model->get_page_data(14);
        $this->view->title = $this->view->content['page_metatitle'];
        $this->view->description = $this->view->content['page_metadescription'];
        $this->view->keywords = $this->view->content['page_metakeywords'];
        
        // legújabb munkák
        $this->view->latest_jobs = $this->home_model->jobs_query(9);

//$this->view->debug(true); 

        $this->view->render('home/tpl_home');
    }

}

?>