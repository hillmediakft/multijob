<?php

class Feltetelek extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleExpire();
        $this->loadModel('feltetelek_model');
    }

    public function index() {
        Util::redirect('error');
    }

    public function kilepes() {
        // alapbeállítások lekérdezése
        $this->view->settings = $this->feltetelek_model->get_settings();

        // kilépési adatok küldése e-mailban
        if (!empty($_POST)) {

            // adatok szűrése strip_tags függvénnyel
            $data = array();
            foreach ($_POST as $key => $value) {
                $data[$key] = strip_tags($value);
            }

            $from_name = $data['name'];
            $from_email = $this->view->settings['email_diak'];
            //$to_email = 'kilepes@multijobisz.hu';
            $to_email = 'mandro1@freemail.hu';
            $to_name = $this->view->settings['ceg'];
            $subject = 'Üzenet érkezett!';
            $message = <<<_msg

            <html>    
            <body>
                <h2>A kilépő diák adatai:</h2>
                <div>
                    <strong>Név:</strong> {$data['name']} <br />
                    <strong>Anyja neve:</strong> {$data['mother_name']} <br />
                    <strong>Születési idő:</strong> {$data['birth_time']} <br />
                    <strong>Adószám:</strong> {$data['tax_id']} <br />
                    <strong>Bankszámlaszám:</strong> {$data['bank_account_number']} <br />
                </div> 
            </body>
            </html>    
_msg;

            //e-mail küldése
            $result = $this->feltetelek_model->send_email($from_email, $from_name, $subject, $message, $to_email, $to_name);

            if ($result) {
                Message::set('success', 'Kilépési adatok elküldve!');
            } else {
                Message::set('error', 'Üzenet küldési hiba!');
            }

            Util::redirect('feltetelek/kilepes');
        }

        // JS, CSS
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/kilepesi_feltetelek.js');

        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->feltetelek_model->get_page_data(3);
        $this->view->title = $this->view->content['page_metatitle'];
        $this->view->description = $this->view->content['page_metadescription'];
        $this->view->keywords = $this->view->content['page_metakeywords'];

//$this->view->debug(true); 	

        $this->view->render('feltetelek/tpl_feltetelek_kilepes');
    }

    public function munkavallalas() {
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->feltetelek_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->feltetelek_model->get_page_data(2);
        $this->view->title = $this->view->content['page_metatitle'];
        $this->view->description = $this->view->content['page_metadescription'];
        $this->view->keywords = $this->view->content['page_metakeywords'];

//$this->view->debug(true); 	

        $this->view->render('feltetelek/tpl_feltetelek_munkavallalas');
    }

    public function kifizetes() {
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/sidebar_search.js');
        $this->view->js_link[] = $this->make_link('js', SITE_ASSETS, 'pages/common.js');

        // alapbeállítások lekérdezése
        $this->view->settings = $this->feltetelek_model->get_settings();
        // 3 legfrissebb munka
        $this->view->latest_jobs = $this->feltetelek_model->jobs_query(3);
        // oldal tartalmának lekérdezése (paraméter a pages tábla page_id)
        $this->view->content = $this->feltetelek_model->get_page_data(4);
        $this->view->title = $this->view->content['page_metatitle'];
        $this->view->description = $this->view->content['page_metadescription'];
        $this->view->keywords = $this->view->content['page_metakeywords'];

//$this->view->debug(true); 	

        $this->view->render('feltetelek/tpl_feltetelek_kifizetes');
    }

}

?>