<?php 
class Util
{
    /**
     * Redirects to another page.
     *
	 * @param string $location The path to redirect to
     * @param int $status Status code to use
     * @return bool False if $location is not set
     */
    public static function redirect($location, $status = 302) {
		if ( !$location ) {
			return false;
		}
		
		$registry = Registry::get_instance();
		header("Location: " . $registry->site_url . $location, true, $status);
		exit;
    }
	
	/**
	 * Ellenőrzi, hogy a Ajax hívás történt-e
	 *
	 * @return bool true|false
	 */
	public static function is_ajax()
	{
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
		   return true;
		}
		return false;
	}
	
	/**
	 *	File törlése
	 *
	 *	@param	$filename	a törlendő file elérésiútja mappa/filename.ext
	 *	@return	true|false
	 */
	public static function del_file($filename)
	{
		if (is_file($filename)) {
			//ha a file megnyitható és írható
			if(is_writable($filename)){
				unlink($filename);
				return true;
			}
		}
		else {
			return false;
		}
	}
	
	/**
	 * Egy kép elérési útvonalából generál egy elérési útvonalat a bélyegképéhez
	 * Minta: path/to/file/filename.jpg -> path/to/file/filename_thumb.jpg
	 * 
	 * @param	string	$path (a file elérési útja)
	 * @param	bool	$thumb (hozzárak az elérési út végéhez egy thumb mappát)
	 * @return	string	a bélyegkép elérési útvonala
	 */
	public static function thumb_path($path, $thumb = false)
	{
		$path_parts = pathinfo($path);
		$dirname = $path_parts['dirname'];
		$filename = $path_parts['filename'];
		$extension = $path_parts['extension'];
		
		if(!$thumb){
			if(($dirname == '.') || ($dirname == '\\')) {
				$path_with_thumb = $filename . '_thumb.' . $extension;
			} else {
				$path_with_thumb = $dirname . '/' . $filename . '_thumb.' . $extension;
			}
		} else {
			if(($dirname == '.') || ($dirname == '\\')) {
				$path_with_thumb = 'thumb/' . $filename . '_thumb.' . $extension;
			} else {
				$path_with_thumb = $dirname . '/thumb/' . $filename . '_thumb.' . $extension;
			}
		
		}
		return $path_with_thumb;
	}
	
	/**
	 *	Visszaadja a jelenlegi url-t a paraméterben megadott nyelvi kóddal módosítva
	 *
	 *	@param	String	$lang_code	(nyelvi kód)
	 *	@return	String
	 */
    public static function url_with_language($lang_code = 'hu') {
 		$registry = Registry::get_instance();
		$lang = ($lang_code == 'hu') ? '' : $lang_code . '/';
		$area = ($registry->area == 'site') ? '' : $registry->area . '/';
        return BASE_URL . $area . $lang . $registry->uri;
    }
}	
?>