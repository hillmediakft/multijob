<?php 
class home_model extends Model {

	function __construct()
	{
		parent::__construct();
	}

	public function slider_query()
	{
		$this->query->reset();
		$this->query->set_table(array('slider'));
		$this->query->set_columns('*');
		$this->query->set_orderby(array('slider_order'));
		return $this->query->select();
	}

	public function jobs_query($limit = null, $offset = null)
	{
		$this->query->reset();
		$this->query->set_table(array('jobs'));
		$this->query->set_columns(array(
			'jobs.job_id',
			'jobs.job_title',
			'jobs.job_pay',
			'city_list.city_name',
			'district_list.district_name',
			'jobs_list.job_list_name',
			'jobs_list.job_list_photo'
		));
		//$this->query->set_orderby(array('slider_order'));
		$this->query->set_join('left', 'jobs_list', 'jobs.job_category_id', '=', 'jobs_list.job_list_id');
		$this->query->set_join('left', 'city_list', 'jobs.job_city_id', '=', 'city_list.city_id' );
		$this->query->set_join('left', 'district_list', 'jobs.job_district_id', '=', 'district_list.district_id' );
		
		if(!is_null($limit)){
			$this->query->set_limit($limit);
		}
		if(!is_null($offset)){
			$this->query->set_offset($offset);
		}
		$this->query->set_orderby(array('job_id'), 'DESC');
		
		return $this->query->select();
	}
	
	
}
?>