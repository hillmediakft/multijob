<?php
//log fileok adatai
$config['log'] = array(
	'error' => 'logs_error.log',
	'notice' => 'logs_notice.log'
);

$config['email'] = array(
    'password_reset' => array(
        'admin_url' => BASE_URL . 'admin/login/verifypasswordreset',
        'site_url' => BASE_URL . 'users/verifypasswordreset',
        'subject' => 'Új jelszó kérése.',
        'link' => 'Please click on this link to reset your password: '
    ),
    'verification' => array(
        'site_url' => BASE_URL . 'felhasznalok/ellenorzes',
        'subject' => 'Regisztráció hitelesítése.',
        'link' => 'Kérem kattintson erre a linkre a regisztrációja aktiválásához.'
    ),
    'verification_newsletter' => array(
        'site_url' => BASE_URL . 'felhasznalok/ellenorzes_hirlevel',
        'subject' => 'Hírlevélre feliratkozás hitelesítése.',
        'link' => 'Kérem kattintson erre a linkre a feliratkozás aktiválásához.'
    )    
);

$config['login'] = array(
    'facebook_login' => false,
    'facebook_login_app_id' => 'xxx',
    'facebook_login_app_secret' => 'xxx',
    'facebook_login_path' => 'login/loginWithFacebook',
    'facebook_register_path' => 'login/registerWithFacebook',
    'use_gravatar' => false,
    'avatar_size' => 44,
    'avatar_jpeg_quality' => 85,
    'avatar_default_image' => 'default.jpg',
    'avatar_path' => ''
);

$config['cookie'] = array(
    'runtime' => 1209600,
    'domain' => '.localhost'
);

$config['slider'] = array(
    'width' => 1170,
    'height' => 420,
    'thumb_width' => 200,
	'upload_path' => UPLOADS . 'slider_photo/'
);

$config['photogallery'] = array(
    'width' => 800,
    'thumb_width' => 320
);

$config['hash_cost_factor'] = 10;
$config['language_default'] = 'hu';
$config['reg_email_verify'] = true;

$config['jobphoto'] = array(
	'width' => 300,
	'height' => 200,
	'thumb_width' => 80,
	'upload_path' => UPLOADS . 'job_category_photo/',
	'default_photo' => 'default.jpg'
);

$config['user'] = array(
	'width' => 600,
	'height' => 200,
	//'thumb_width' => 80,
	'upload_path' => UPLOADS . 'user_photo/',
	'default_photo' => 'user_placeholder.png'
);

$config['session'] = array(
    'expire_time' => 30,
    'last_activity_name' => 'last_activity' // A $_SESSION['last_activity'] elem fogja tárolni az utolsó aktivitás idejét
);
?>