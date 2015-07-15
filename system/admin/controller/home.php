<?php
class Home extends Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		Auth::handleLogin();

		// adatok bevitele a view objektumba
		$this->view->title = 'Admin kezdő oldal';
		$this->view->description = 'Admin kezdő oldal description';
		
		
		$this->view->js_link[] = $this->make_link('js', ADMIN_JS, 'pages/common.js');
//		$this->view->css = '';
//		$this->view->js = '';
		
		
		$this->view->render('home/tpl_home');
	}
}
?>