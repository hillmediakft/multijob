<?php
class Blog extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('blog_model');
	}
    
    
	public function index()
	{
		
		
	
	

		$this->view->content = $this->blog_model->blog_query();

// $this->view->debug(true);
		
		$this->view->render('blog/tpl_blog');
	
	}
   
    

}
?>