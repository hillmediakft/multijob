<?php 
class Kapcsolat_model extends Site_model {

	function __construct()
	{
		parent::__construct();
	}
	
	function __destruct()
	{
		parent::__destruct();
	}
	
	public function offices_data_query()
    {
        $this->query->reset();
        $this->query->set_table(array('offices'));
        $this->query->set_columns('*');
        return $this->query->select();
    }

}
?>