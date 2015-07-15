<?php 
class Settings_model extends Model {

	/**
     * Constructor, létrehozza az adatbáziskapcsolatot
     */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Oldal szintű beállítások módosításának elmentése
	 *
	 * @return true/false
	 */
	public function update_settings()
	{
		$data['ceg'] = $_POST['setting_ceg'];
		$data['cim'] = $_POST['setting_cim'];
		$data['email'] = $_POST['setting_email'];
		$data['tel'] = $_POST['setting_tel'];
		

		// új adatok beírása az adatbázisba (update) a $data tömb tartalmazza a frissítendő adatokat 
		$this->query->reset();
		$this->query->set_table(array('settings'));
		$this->query->set_where('id', '=', 1);
		$result = $this->query->update($data);
				
		if($result) {
            Message::set('success', 'settings_update_success');
			return true;
		}
		else {
            Message::set('error', 'unknown_error');
			return false;
		}
	}

}
?>