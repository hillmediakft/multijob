<?php 
class Offices_model extends Model {

	/**
     * Constructor, létrehozza az adatbáziskapcsolatot
     */
	function __construct()
	{
		parent::__construct();
	}


    /*
     * Irodák adatainak lekérdezése
     */
    public function offices_data_query()
    {
        $this->query->reset();
        $this->query->set_table(array('offices'));
        $this->query->set_columns('*');
        return $this->query->select();
    }
    
	/**
	 *	Iroda törlése
	 *
	 *	@param	array	$id_arr		a törlendő rekordok id-it tartalmazó tömb
	 *	@return	array
	 */
	public function delete_office($id)
	{
        $success_counter = 0;
        $error_counter = 0;

        //iroda törlése	
        $this->query->reset();
        $this->query->set_table(array('offices'));
        //a delete() metódus integert (lehet 0 is) vagy false-ot ad vissza
        $result = $this->query->delete('office_id', '=', $id);

        if($result !== false) {
            // ha a törlési sql parancsban nincs hiba
            if($result > 0){
                //sikeres törlés
                $success_counter += $result;
            }
            else {
                //sikertelen törlés
                $error_counter += 1;
            }
        }
        else {
            // ha a törlési sql parancsban hiba van
            throw new Exception('Hibas sql parancs: nem sikerult a DELETE lekerdezes az adatbazisbol!');
            return false;
        }

		return array("success" => $success_counter, "error" => $error_counter);	
	}    
    
}
?>