<?php 
class Paginator {
	
	/**
	 *	GET paraméter neve pl.: oldal (?oldal=5)
	 */
	private $pagename; 	

	/**
	 *	egyszerre ennyi elem jelenik meg az oldalon
	 */
	private $limit;

	/**
	 *	ettől a sorszámtól kezdi kiveni a sorokat az adatbázisból
	 */
	private $offset;

	/**
	 *	A jelenlegi oldal mindkét oldalán hány elem legyen az oldalszámozásnál
	 */
	private $stages;

	/**
	 *	sorok száma a táblában (max ennyi oldal lehet, ha egy oldalon csak egy elem van)
	 */
	private $total_pages;

	/**
	 *	Ez a tulajdonság tartalmazza az oldal számát
	 */
	private $page_id;
	
	/**
	 *	Szűrés utáni elemek száma
	 *
	 */
	private $record_filtered; 


	/**
	 * CONSTRUCTOR
	 *
     * @param  string   $pagename 	GET paraméter neve ami a lapozáshoz kapcsolódik
     * @param  integer  $limit 		egyszerre ennyi elem jelenik meg az oldalon	
	 * @param  integer  $stages 	a jelenlegi oldal mindkét oldalán hány elem legyen az oldalszámozásnál
	 */
	function __construct($pagename, $limit = 10, $stages = 2)
	{
		$this->pagename = $pagename;
		$this->limit = $limit;
		$this->stages = $stages;
		$this->set_page_id();
	}	
	
	
	/**
	 * Visszaadja az offset-et
	 *
	 * @return integer
	 */
	public function get_offset(){
		return ($this->page_id * $this->limit) - $this->limit;
	}
	
	/**
	 * Visszaadja a limitet
	 *
	 * @return integer
	 */
	public function get_limit(){
		return $this->limit;
	}

	/**
	 * Beállítja a page_id tulajdonság értékét (az oldal számát)
	 */
	private function set_page_id(){
		$this->page_id = (int) (!isset($_GET[$this->pagename]) ? 1 : $_GET[$this->pagename]); 
		$this->page_id = ($this->page_id == 0 ? 1 : $this->page_id);
	}	
	
	/**
	 * A tábla összes rekordjának a számát adja meg a $total_pages tulajdonságnak 
	 *
	 * @param integer	$total_pages
	 */
	public function set_total($total_pages){
		$this->total_pages = $total_pages;
	}

	/**
	 * A tábla összes rekordjának a számát adja meg a $total_pages tulajdonságnak 
	 *
	 * @param integer	$total_pages
	 */
	public function set_record_filtered($record){
		$this->record_filtered = $record;
	}
	
	/**
	 * oldalszámozás megjelenítése 
	 *
	 * @param string $path optionally set the path for the link
	 * @param string $ext optionally pass in extra parameters to the GET
	 * @return string returns the html menu
	*/
	public function page_links($path = '?', $ext = null)
	{
		// Initial page num setup
		$prev = $this->page_id - 1;	
		$next = $this->page_id + 1;							
		$lastpage = ceil($this->total_pages/$this->limit);		
		$LastPagem1 = $lastpage - 1;					

//var_dump($this->limit);		
//var_dump($this->record_filtered);		
//var_dump($lastpage);		
		
		
		$paginate = '';
		//csak akkor fűzi hozzá a string-hez a többi elemet, ha az utolsó oldalon legalább 1 elem van
		if($lastpage > 1) {
		
			$paginate .= '<ul>' . "\n";
			// A vissza linkje
			if ($this->page_id > 1){
				$paginate.= '<li><a href="' . $path . $this->pagename . '=' . $prev . '">vissza</a></li>';
			}
			else {
				$paginate.= '<li class="inactive"><span>vissza</span></li>';
			}
			// Oldalak	
			if ($lastpage < 7 + ($this->stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $this->page_id){
						$paginate .= '<li class="active"><span>' . $counter . '</span></li>';
					} else {
						$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $counter . '">' . $counter . '</a></li>';
					}					
				}
			}
			elseif($lastpage > 5 + ($this->stages * 2))	// Enough pages to hide a few?
			{
				// Beginning only hide later pages
				if($this->page_id < 1 + ($this->stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($this->stages * 2); $counter++)
					{
						if ($counter == $this->page_id){
							$paginate .= '<li class="active"><span>' . $counter . '</span></li>';
						}else{
							$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $counter . '">' . $counter . '</a></li>';
						}					
					}
					$paginate .= '...';
					$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $LastPagem1 . '">' . $LastPagem1 . '</a></li>';
					$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $lastpage . '">' . $lastpage . '</li></a>';		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($this->stages * 2) > $this->page_id && $this->page_id > ($this->stages * 2))
				{
					$paginate .= '<li><a href="' . $path . $this->pagename . '=1">1</a></li>';
					$paginate .= '<li><a href="' . $path . $this->pagename . '=2">2</a></li>';
					$paginate .= '...';
					for ($counter = $this->page_id - $this->stages; $counter <= $this->page_id + $this->stages; $counter++)
					{
						if ($counter == $this->page_id){
							$paginate .= '<li class="active"><span>' . $counter . '</span></li>';
						} else {
							$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $counter . '">' . $counter . '</a></li>';
						}					
					}
					$paginate .= '...';
					$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $LastPagem1 . '">' . $LastPagem1 . '</a></li>';
					$paginate .= '<li><a href="' . $path . $this->pagename . '=' . $lastpage . '">' . $lastpage . '</a></li>';		
				}
				// End only hide early pages
				else
				{
					$paginate.= '<li><a href="' . $path . $this->pagename . '=1">1</a></li>';
					$paginate.= '<li><a href="' . $path . $this->pagename . '=2">2</a></li>';
					$paginate.= '...';
					for ($counter = $lastpage - (2 + ($this->stages * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $this->page_id){
							$paginate.= '<li class="active"><span>' . $counter . '</span></li>';
						} else {
							$paginate.= '<li><a href="' . $path . $this->pagename . '=' . $counter . '">' . $counter . '</a></li>';
						}					
					}
				}
			}
						
			// A következő linkje
			if ($this->page_id < $counter - 1){ 
				$paginate.= '<li><a href="' . $path . $this->pagename . '=' . $next . '">következő</a></li>';
			} else {
				$paginate.= '<li class="inactive"><span>következő</span></li>';
			}
			
			$paginate.= '</ul>' . "\n"; 

		}
	return $paginate;
	}
}
?>