<?php 
class Pre_register extends Controller {

	function __construct()
	{
		parent::__construct();
		Auth::handleLogin();
        $this->loadModel('pre_register_model');
	}

	public function index()
	{
	
		$this->view->title = 'Admin előregisztráció hozzáadása oldal';
		$this->view->description = 'Admin előregisztráció oldal description';

		// az oldalspecifikus css linkeket berakjuk a view objektum css_link tulajdonságába (ami egy tömb)
		// a make_link() metódus az anyakontroller metódusa (így egyszerűen meghívható bármelyik kontrollerben)
	//$this->view->css_link[] = $this->make_link('css', ADMIN_ASSETS, 'plugins/select2/select2.css');
		$this->view->css_link[] = $this->make_link('css', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
		
		// az oldalspecifikus javascript linkeket berakjuk a view objektum js_link tulajdonságába (ami egy tömb)
	//$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/select2/select2.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/datatables/media/js/jquery.dataTables.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/bootbox/bootbox.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'datatable.js');
		
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/pre_register.js');
	
//$this->view->debug(true);
		
		$this->view->render('pre_register/tpl_pre_register');		
	}
	

	/**
	 *	Előregisztráció minden adatának megjelenítése modal-ban
	 */
	public function ajax_view_prereg()
	{
		if (Util::is_ajax()) {
			$this->view->content = $this->pre_register_model->alldata_query($this->registry->params['id']);

			$this->view->render('pre_register/tpl_prereg_view_modal', true);
		} else {
			Util::redirect('error');
		}
	}

	/**
	 *	előregisztráció törlése
	 */
	public function ajax_delete_prereg()
	{
		if (Util::is_ajax()) {
			if(isset($_POST['delete_id'])){
				// ez a metódus true-val tér vissza (false esetén kivételt dob!)
				$result = $this->pre_register_model->delete_prereg(array($_POST['delete_id']));
			
				// visszatérés üzenetekkel
				if($result['success'] == 1) {
					$message = Message::send('Az előregisztráció törlése sikerült.');	
					echo json_encode(array(
						"status" => 'success',
						"message" => $message
						));
				}
				else {
					$message = Message::send('Az előregisztráció törlése nem sikerült!');	
					echo json_encode(array(
						"status" => 'error',
						"message" => $message
						));
				}			

			} else {
				throw new Exception('HIBA az ajax_delete_prereg metódusban: Nem létezik $_POST["delete_id"]');
			}
		} else {
			Util::redirect('error');
		}
	}


	
	
	/**
	 *	Előregisztrációs listát adja vissza és kezeli a csoportos művelteket is
	 */
	public function ajax_get_prereg()
	{
        if (Util::is_ajax()) {
			$request_data = $_REQUEST;
			$json_data = $this->pre_register_model->get_prereg($request_data);
			// adatok visszaküldése a javascriptnek
			echo json_encode($json_data);
		
		} else {
			Util::redirect('error');
		}		
	}

	/**
	 *	Előregisztrációs adatok módosítása
	 */
	public function update()
	{
		$id = (int)$this->registry->params['id'];
		
		// adatok módosítása
		if(!empty($_POST)){
			$result = $this->pre_register_model->update_prereg($id);
			
			if($result) {
				Util::redirect('pre_register');
			} else {
				Util::redirect('pre_register/update');
			}
		}
		
		$this->view->title = 'Admin előregisztráció módosítása oldal';
		$this->view->description = 'Admin előregisztráció módosítása description';
		
	//form validator	
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/jquery-validation-new/jquery.validate.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/jquery-validation-new/additional-methods.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/jquery-validation-new/localization/messages_hu.js');
	// oldal js
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/pre_register_update.js');
		
		// módosítandó adatok lekérdezése
		$this->view->content = $this->pre_register_model->alldata_query($id);

//$this->view->debug(true);
		
		$this->view->render('pre_register/tpl_update_prereg');		
	} 	

	
}
?>