<?php
class blog_model extends Model {

	function __construct()
	{
		parent::__construct();
	}
    
	/**
	 *	Visszaadja a blog tábla tartalmát
	 *	Ha kap egy id paramétert (integer), akkor csak egy sort ad vissza a táblából
	 *
	 *	@param $id Integer 
	 */
	public function blog_query($id = null)
	{
		$this->query->reset(); 
		$this->query->set_table(array('blog')); 
		$this->query->set_columns('*'); 
		if(!is_null($id)){
			$id = (int)$id;
			$this->query->set_where('blog_id', '=', $id); 
		}
		return $this->query->select(); 
	}

    
}
?>