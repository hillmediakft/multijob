<?php 
class Ajax_request Extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->loadModel('ajax_request_model');
	}

	
	public function index()
	{
		Util::redirect('error');
	}
	
	
	
	/**
	 *	Város lista
	 *
	 */
	public function ajax_city_list()
	{
		if(Util::is_ajax()){
			$id = (int)$_POST['county_id'];
			$result = $this->ajax_request_model->city_list_query($id);
			
			$string = '<option value="">Válasszon...</option>' . "\r\n";
			//$string = '';
			foreach($result as $value) {
				$string .= '<option value="' . $value['city_id'] . '">' . $value['city_name'] . '</option>' . "\r\n";
			} 
			//válasz a javascriptnek (option lista)
			echo $string;			
			
		} else {
			Util::redirect('error');
		}
	}

	/**
	 *	Megye lista
	 *
	 */
	public function ajax_county_list()
	{
		if(Util::is_ajax()){
			$result = $this->ajax_request_model->county_list_query();
			$string = '<option value="">Válasszon...</option>' . "\r\n";
			//$string = '';
			foreach($result as $value) {
				$string .= '<option value="' . $value['county_id'] . '">' . $value['county_name'] . '</option>' . "\r\n";
			} 
			//válasz a javascriptnek (option lista)
			echo $string;			
			
		} else {
			Util::redirect('error');
		}
	}
	
	/**
	 *	Kerület lista
	 *
	 */
	public function ajax_district_list()
	{
		if(Util::is_ajax()){
			$result = $this->ajax_request_model->district_list_query();
			$string = '<option value="">Válasszon...</option>' . "\r\n";
			//$string = '';
			foreach($result as $value) {
				$string .= '<option value="' . $value['district_id'] . '">' . $value['district_name'] . '</option>' . "\r\n";
			} 
			//válasz a javascriptnek (option lista)
			echo $string;			
			
		} else {
			Util::redirect('error');
		}
	}

	/**
	 *	Munka típus lista
	 *
	 */
	public function ajax_job_category_list()
	{
		if(Util::is_ajax()){
			$result = $this->ajax_request_model->job_category_list_query();
			$string = '<option value="">Válasszon...</option>' . "\r\n";
			//$string = '';
			foreach($result as $value) {
				$string .= '<option value="' . $value['job_list_id'] . '">' . $value['job_list_name'] . '</option>' . "\r\n";
			} 
			//válasz a javascriptnek (option lista)
			echo $string;			
			
		} else {
			Util::redirect('error');
		}
	}	
	
	
	
	
}
?>