<?php
/**
* Class Auth
* Simply checks if user is logged in. In the app, several controllers use Auth::handleLogin() to
* check if user if user is logged in, useful to show controllers/methods only to logged-in users.
*/
class Auth {
    
    private static $expire_time;
    private static $element_name;
    //private static $area;
    private static $site_url;
    private static $logged_in;
    private static $target_url;
    

    private function __construct(){}

    /**
     * Osztály tulajdonságainak beállítása
     *
     */
    private static function set_attributes()
    {
        self::$expire_time = Config::get('session.expire_time', 1800);
        self::$element_name = Config::get('session.last_activity_name', 'last_activity');
        $registry = Registry::get_instance();
        self::$site_url = $registry->site_url;
        self::$logged_in = ($registry->area == 'site') ? 'user_site_logged_in' : 'user_logged_in';
        self::$target_url = ($registry->area == 'site') ? '' : 'login';
    }
    
    /**
     *  Ellenőrzi, hogy ha be van jelentkezve a felhasználó, akkor lejárt-e a bejelentkezési időkorlát
     *  PRIVÁT: Csak a set_attributes() metódus után hívható meg!!
     */
    private static function _check_expire()
    {
        if(isset($_SESSION[self::$logged_in]) && $_SESSION[self::$logged_in] === true){

            if(!isset($_SESSION[self::$element_name])) {
                throw new Exception('Nem letezik a $_SESSION tombben utolso aktivitas elem!');
                exit;
            }
            
            if($_SESSION[self::$element_name] < (time() - self::$expire_time)){
                // ha lejárt az időkorlát
                Session::destroy();
                Session::init();
                //Session::set($logged_in, false);
                Message::set('error', 'A munkamenet lejárt!');
                header('location: ' . self::$site_url . self::$target_url);
                exit;    
            } else {
                $_SESSION[self::$element_name] = time();
            } 
        }
    }     
    
    
    
    
    /**
     *  Ellenőrzi, hogy ha be van jelentkezve a felhasználó, akkor lejárt-e a bejelentkezési időkorlát
     *
     *  @param  string  $target_url     átirányítás helye
     */
    public static function handleExpire($target_url = null)
    {
        self::set_attributes();

		if(!is_null($target_url)) {
			self::$target_url = $target_url;
		}
                
        self::_check_expire();
    }     
    
    /**
     *  Ellenőrzi, hogy be van-e jelentkezve a felhasználó
     *
     *  @param  string  $target_url     átirányítás helye
     */
    public static function handleLogin($target_url = null)
    {
        self::set_attributes();
        
		if(!is_null($target_url)) {
			self::$target_url = $target_url;
		}

		// initialize the session
        Session::init();
            
        // Ha a user nincs bejelentkezve, akkor session törlése és átirányítás
        if (!isset($_SESSION[self::$logged_in]) || $_SESSION[self::$logged_in] === false) {
            Session::destroy();
			header('location: ' . self::$site_url . self::$target_url);
			exit;
        }
        
        // ha a user be van jelentkezve, megnézzük hogy nem járt-e le az időkorlát (ha igen session törlés, üzenet, átirányítás)
        self::_check_expire();
    }
} //osztály vége
?>