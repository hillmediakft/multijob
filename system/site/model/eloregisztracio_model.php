<?php 
class Eloregisztracio_model extends Site_model {

	/**
     * Constructor, létrehozza az adatbáziskapcsolatot
     */
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
		parent::__destruct();
	}

	/**
	 *	Visszadja, hogy előregisztrált-e már a bejelentkezett user
	 *
	 *	@return	bool
	 */
	public function check_preregister()
	{
		$this->query->reset();
		$this->query->set_table(array('pre_register_user'));
		$this->query->set_columns(array('user_id'));
		$this->query->set_where('user_id', '=', (int)Session::get('user_site_id'));
		$result = $this->query->select();
		return (count($result) == 1) ? true : false;
	}


	/**
	 *	Előregisztráció mentése adatbázisba
	 *
	 */	
	public function pre_register()
	{
		$data = $_POST;
		
		foreach($data as $key => $value) {
			if($data[$key] == ''){
				$data[$key] = NULL;				
			}
		} 

		// insert-nél a submit gomb
		if(isset($data['pre_register_submit'])){
			unset($data['pre_register_submit']);
		}
		
	
		$data['school_type'] = (int)$data['school_type'];
		$data['user_id'] = (int)Session::get('user_site_id');	


	 // var_dump($data);
	 // die('xxxx');

	
	
		$this->query->reset();
		$this->query->set_table(array('pre_register_user'));
		$result = $this->query->insert($data);
	
		if($result) {
			return true;			
		} else {
			return false;			
		}
	
	}

}
?>