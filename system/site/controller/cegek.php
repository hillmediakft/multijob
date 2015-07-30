<?php
class Cegek extends Controller {
    
    function __construct()
	{
		parent::__construct();
		$this->loadModel('cegek_model');
	}

    
    public function index()
    {
        Util::redirect('error');    
    }

    
    public function cegbemutato()
    {
        die('work in progress  dd.');
    }
    
    
    public function ajanlatkeres()
    {
        die('work in progress.');
        
    }
    


}
?>