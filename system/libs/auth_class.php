<?php
/**
* Class Auth
* Simply checks if user is logged in. In the app, several controllers use Auth::handleLogin() to
* check if user if user is logged in, useful to show controllers/methods only to logged-in users.
*/
class Auth
{
    public static function handleLogin($target_url = null)
    {
		$registry = Registry::get_instance();
	
		$logged_in = ($registry->area == 'site') ? 'user_site_logged_in' : 'user_logged_in';
		if(is_null($target_url)) {
			$target_url = ($registry->area == 'admin') ? 'login' : '';
		}

		// initialize the session
        Session::init();
		
        // if user is still not logged in, then destroy session, handle user as "not logged in" and
        // redirect user to login page
        if (!isset($_SESSION[$logged_in])) {
            Session::destroy();
			header('location: ' . $registry->site_url . $target_url);
			exit;
        }
    }
} //osztály vége
?>