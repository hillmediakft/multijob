<?php 
class Ajax_request extends Controller {

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
	
    /**
     *  AJAX Email küldés
     *
     */
	public function ajax_send_email()
    {
        if(Util::is_ajax()){
            
            $from_email = $_POST['from_email'];
            $from_name = $_POST['from_name'];
            $message = $_POST['message'];
            $to_email = 'mandro1@freemail.hu';
            $to_name = 'mandro1';
            $subject = 'Ez egy teszt üzenet';
            
            $result = $this->ajax_request_model->send_email($from_email, $from_name, $message, $to_email, $to_name, $subject);    
        
            if($result) {
                $message = array(
                    'status' => 'success',
                    'message' => 'Üzenet elküldve!'
                );
                echo json_encode($message);
            } else{
                $message = array(
                    'status' => 'error',
                    'message' => 'Az üzenet küldése sikertelen!'
                );
                echo json_encode($message);
            }
  
        } else {
                Util::redirect('error');
        }
    }
	
	
}
?>