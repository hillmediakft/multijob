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
        
    }
    
    
    public function ajanlatkeres()
    {
        
    }
    


}
?>