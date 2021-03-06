<?php

class Eloregisztracio extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->loadModel('eloregisztracio_model');
    }

    public function index() {
        Auth::handleLogin();

        // lekérdezzük, hogy kitöltötte-e már az előregisztrációt a bejelentkezett user (return bool)
        $result_prereg = $this->eloregisztracio_model->check_preregister();

        if ($result_prereg === false && isset($_POST['pre_register_submit'])) {
            $result = $this->eloregisztracio_model->pre_register('insert');

            if ($result) {
                Util::redirect('munkak');
            } else {
                Util::redirect('eloregisztracio');
            }
        }
        if ($result_prereg === true && isset($_POST['pre_register_update'])) {
            $result = $this->eloregisztracio_model->pre_register('update');

            if ($result) {
                Util::redirect('munkak');
            } else {
                Util::redirect('eloregisztracio');
            }
        }

        //validátor
        /*
          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery-validation/jquery.validate.min.js');
          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery-validation/additional-methods.min.js');
          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery-validation/localization/messages_hu.js');
          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery-validation/localization/methods_hu.js');

          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'plugins/jquery.blockui.min.js');
          $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/modal_handler.js');
         */
        //$this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/eloregisztracio.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->eloregisztracio_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->eloregisztracio_model->jobs_query(3);

        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->eloregisztracio_model->get_page_data(15);
        $this->view->title = $this->view->content['page_metatitle'];
        $this->view->description = $this->view->content['page_metadescription'];
        $this->view->keywords = $this->view->content['page_metakeywords'];

        if ($result_prereg) {
            $this->view->prereg_data = $this->eloregisztracio_model->get_prereg_data();
//$this->view->debug(true); 
            $this->view->render('eloregisztracio/tpl_eloregisztracio_update');
        } else {
//$this->view->debug(true); 

            $this->view->render('eloregisztracio/tpl_eloregisztracio');
        }
    }

    /**
     * 	(AJAX) Felhasználó regisztráció
     */
    /*
      public function ajax_register()
      {
      if(Util::is_ajax()){

      $respond = $this->regisztracio_model->register_user();
      echo $respond;
      exit();

      } else {
      Util::redirect('error');
      }
      }
     */
}

?>