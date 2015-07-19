<?php 
class Home_model extends Site_model {

	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
		parent::__destruct();
	}	

	public function slider_query()
	{
		$this->query->reset();
		$this->query->set_table(array('slider'));
		$this->query->set_columns('*');
		$this->query->set_orderby(array('slider_order'));
		return $this->query->select();
	}

}
?>