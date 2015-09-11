<?php
class Offices extends Controller {
   
    public function __construct()
	{
		parent::__construct();
		Auth::handleLogin();
        $this->loadModel('offices_model');
	}

	public function index()
	{
		// adatok bevitele a view objektumba
		$this->view->title = 'Admin irodák oldal';
		$this->view->description = 'Admin irodák oldal description';
		
		$this->view->css_link[] = $this->make_link('css', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/datatables/media/js/jquery.dataTables.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_ASSETS, 'plugins/bootbox/bootbox.min.js');
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'datatable.js');        
        
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/offices.js');
		
        $this->view->offices = $this->offices_model->offices_data_query();
		
		$this->view->render('offices/tpl_offices');
	}
    
    public function insert()
	{
		// adatok bevitele a view objektumba
		$this->view->title = 'Admin irodák oldal';
		$this->view->description = 'Admin irodák oldal description';
		
		
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/common.js');
		
		
		$this->view->render('offices/tpl_offices_insert');
	}
    
    public function update()
	{
		// adatok bevitele a view objektumba
		$this->view->title = 'Admin irodák oldal';
		$this->view->description = 'Admin irodák oldal description';
		
		
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/common.js');
		
		
		$this->view->render('offices/tpl_offices_update');
	}
    
/* -------------------------- */
    
    /**
	 *	Iroda törlése
	 */
	public function ajax_delete_office()
	{
		if(isset($_POST['delete_id'])){

            $id = (int)$_POST['delete_id'];
            
			// ez a metódus true-val tér vissza (false esetén kivételt dob!)
			$result = $this->offices_model->delete_office($id);
		
			// visszatérés üzenetekkel
			if($result['success'] == 1) {
				$message = Message::send('Az iroda törlése sikerült.');	
				echo json_encode(array(
					"status" => 'success',
					"message" => $message
					));
			}
			else {
				$message = Message::send('Az iroda törlése nem sikerült!');	
				echo json_encode(array(
					"status" => 'error',
					"message" => $message
					));
			}			

		} else {
			throw new Exception('HIBA az ajax_delete_office metódusban: Nem létezik $_POST["delete_id"]');
		}
	}
    
}
?>