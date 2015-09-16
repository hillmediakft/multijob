<?php

class Munkak extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleExpire();
        $this->loadModel('munkak_model');
    }

    public function index() {
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->munkak_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->munkak_model->jobs_query(3);
        $this->view->title = 'Munka diákoknak | Multijob Iskolaszövetkezet.';
        $this->view->description = 'Munka diákoknak a Multijob Iskolaszövetkezetnél. Diákmunka az ország több területén.';
        $this->view->keywords = 'diákmunka, alkalmi munka, multijob';

        // paginator
        include(LIBS . '/pagine_class.php');
        // paginátor objektum létrehozása (paraméter neve, limit)
        $pagine = new Paginator('oldal', 9);
        // adatok lekérdezése limittel
        $this->view->jobs_data = $this->munkak_model->jobs_filter_query($pagine->get_limit(), $pagine->get_offset());
        // szűrési feltételeknek megfelelő összes rekord száma
        $filter_count = $this->munkak_model->jobs_filter_count_query();
        $pagine->set_total($filter_count);
        // lapozó linkek
        $this->view->pagine_links = $pagine->page_links($this->registry->uri_path);

//$this->view->debug(true); 	

        $this->view->render('munkak/tpl_munkak');
    }

}

?>