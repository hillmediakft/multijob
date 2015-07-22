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
	 *	Előregisztráció insert és update 
	 *
	 *	@param	string	$mode		(insert|update)
	 */	
	public function pre_register($mode)
	{
		$data = $_POST;
		
		// insert-nél a submit gomb adat törlése
		if($mode == 'insert'){
			unset($data['pre_register_submit']);
		}
		// update-nél a submit gomb adat törlése
		if($mode == 'update'){
			unset($data['pre_register_update']);
		}
		
	// üres stringek konvertálása null-ra
		foreach($data as $key => $value) {
			if($data[$key] == ''){
				$data[$key] = null;				
			}
		} 

	// adatok feldolgozása	
			
		$data['school_type'] = (int)$data['school_type'];
		$data['user_id'] = (int)Session::get('user_site_id');	
		//$data['birth_time'] = null;	


	    //var_dump($data);
	    //die('xxxx');

	
	
	// adatbázis műveletek
		if($mode == 'insert'){
			$this->query->reset();
			$this->query->set_table(array('pre_register_user'));
			$result = $this->query->insert($data);
			
			if($result) {
				return true;				
			} else {
				Message::set('error', 'A regisztráció nem sikerült, próbálja újra!');
				return false;
			}
		}
		if($mode == 'update'){
			$this->query->reset();
			$this->query->set_table(array('pre_register_user'));
			$this->query->set_where('user_id', '=', $data['user_id']);
			$result = $this->query->update($data);			

			if($result == 1) {
				return true;				
			} else {
				Message::set('error', 'Az adatok módosítása nem sikerült, próbálja újra!');
				return false;
			}
		}
	}
	
	public function get_prereg_data()
	{
		$this->query->reset();
		$this->query->set_table(array('pre_register_user'));
		$this->query->set_columns('*');
		$this->query->set_where('user_id', '=', (int)Session::get('user_site_id'));
		$result = $this->query->select();
		return $result[0];
	}
	

}
?>