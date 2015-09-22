<?php $logged_in = Session::get('user_site_logged_in'); ?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo BASE_URL; ?>">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">    

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap.css" type="text/css">
        <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap-responsive.css" type="text/css">
        <link rel='stylesheet' href='<?php echo SITE_ASSETS; ?>fonts/font-awesome/css/font-awesome.min.css' type='text/css' media='all' />
        <link rel="stylesheet" href="<?php echo SITE_ASSETS; ?>plugins/chosen/chosen.css" type="text/css">
        <link rel="stylesheet" href="<?php echo SITE_ASSETS; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
        <link rel="stylesheet" href="<?php echo SITE_ASSETS; ?>plugins/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo SITE_CSS; ?>multijob.css" type="text/css" id="color-variant-default">
        <link rel="stylesheet" href="<?php echo SITE_CSS; ?>modositas.css" type="text/css">

        <!-- OLDALSPECIFIKUS CSS LINKEK -->
        <?php
        if (isset($this->css_link)) {
            foreach ($this->css_link as $value) {
                echo $value;
            }
        }
        ?>

    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.4";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="wrapper-outer" >
            <div id="wrapper">
                <div id="wrapper-inner">
                    <!-- BREADCRUMB -->
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="span12">

                                    <div class="account pull-right">
                                        <ul class="nav nav-pills">
                                            <li><a data-toggle="modal" data-target="#modal_subscribe" href="#">Feliratkozás hírlevélre</a></li>

                                            <?php if (!isset($logged_in) || $logged_in === false) { ?>
                                                <li><a data-toggle="modal" data-target="#modal_register" href="#">Regisztráció</a></li>
                                            <?php } ?>
                                            <?php if ($logged_in === true) { ?>
                                                <li><span>Bejelentkezve <?php echo Session::get('user_site_name'); ?>&nbsp; &raquo; </span><a style="float: left; padding-left: 0px;" href="felhasznalok/kijelentkezes">Kijelentkezés</a></li>
                                            <?php } else { ?>
                                                <li><a data-toggle="modal" data-target="#modal_login" href="#">Bejelentkezés</a></li>
                                            <?php } ?>	

                                        </ul>
                                    </div>
                                </div><!-- /.span12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.breadcrumb-wrapper -->

                    <!-- HEADER -->
                    <div id="header-wrapper">
                        <div id="header">
                            <div id="header-inner">
                                <div class="container">

                                    <!-- ÜZENETEK						  
                                                            <div class="row">
                                                                <div class="span12">
                                                                    <div id="feedback_message">
                                    <?php //$this->renderFeedbackMessages();  ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                    -->						

                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <div class="row">
                                                <div class="logo-wrapper span4">
                                                    <a href="<?php echo $this->registry->current_url; ?>#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                                    <div class="logo">
                                                        <a href="" title="Kezdőoldal">
                                                            <img src="<?php echo SITE_IMAGE; ?>logo.png" alt="Home">
                                                        </a>
                                                    </div><!-- /.logo -->

                                                    <div class="site-slogan">
                                                        <span>Munkalehetőségek<br>diákoknak</span>
                                                    </div><!-- /.site-slogan -->
                                                </div><!-- /.logo-wrapper -->

                                                <div class="info">
                                                    <div class="site-email">
                                                        <?php echo Util::safe_mailto($settings['email']); ?>
                                                    </div><!-- /.site-email -->

                                                    <div class="site-phone">
                                                        <span><?php echo $settings['tel'] ?></span>
                                                    </div><!-- /.site-phone -->
                                                </div><!-- /.info -->

                                                <?php if ($logged_in) { ?>
                                                    <a class="btn btn-primary btn-large list-your-property arrow-right" href="eloregisztracio">Adatlap kitöltése</a>
                                                <?php } else { ?>
                                                    <a class="btn btn-primary btn-large list-your-property arrow-right" data-toggle="modal" data-target="#modal_nowwork" href="#">Most akarok dolgozni</a>
                                                <?php } ?>





                                            </div><!-- /.row -->
                                        </div><!-- /.navbar-inner -->
                                    </div><!-- /.navbar -->
                                </div><!-- /.container -->
                            </div><!-- /#header-inner -->
                        </div><!-- /#header -->
                    </div><!-- /#header-wrapper -->

                    <!-- NAVIGATION -->
                    <div id="navigation">
                        <div class="container">
                            <div class="navigation-wrapper">
                                <div class="navigation clearfix-normal">

                                    <ul class="nav">
                                        <li>
                                            <a href="" class="no_arrow <?php echo ($this->registry->controller == 'home' && $this->registry->action == 'index') ? 'active' : ''; ?>">Kezdőoldal</a>
                                        </li>
                                        <li>
                                            <a href="munkak" class="no_arrow <?php echo (($this->registry->controller == 'munkak' || $this->registry->controller == 'munka') && $this->registry->action == 'index') ? 'active' : ''; ?>">Munkák</a>
                                        </li>
                                        <!--
                                        <li>
                                            <a href="rolunk" class="no_arrow <?php //echo ($this->registry->controller == 'rolunk' && $this->registry->action == 'index') ? 'active' : '';    ?>">Rólunk</a>
                                        </li>
                                        -->
                                        <li class="menuparent">
                                            <span class="menuparent nolink <?php echo ($this->registry->controller == 'feltetelek') ? 'active' : ''; ?>">Feltételek</span>
                                            <ul>
                                                <li><a href="feltetelek/munkavallalas">Munkavállalási feltételek</a></li>
                                                <li><a href="feltetelek/kilepes">Kilépési feltételek</a></li>
                                                <li><a href="feltetelek/kifizetes">Pénzkifizetési feltételek</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="kollegak" class="no_arrow <?php echo ($this->registry->controller == 'kollegak' && $this->registry->action == 'index') ? 'active' : ''; ?>">Kollégáink</a>
                                        </li>

                                        <li>
                                            <a href="cegek/cegbemutato" class="no_arrow <?php echo ($this->registry->controller == 'cegek' && ($this->registry->action == 'cegbemutato' || $this->registry->action == 'munkaero_kolcsonzes' || $this->registry->action == 'szolgaltatasaink')) ? 'active' : ''; ?>">Cégeknek</a>
                                            <!--                                            <ul>
                                                                                            <li><a href="cegek/cegbemutato">Cégbemutató</a></li>
                                                                                            <li><a href="cegek/munkaero-kolcsonzes">Munkaerő-kölcsönzés</a></li>
                                                                                            <li><a href="cegek/rehabilitacios-uzletag">Rehabilitációs üzletág</a></li>
                                                                                            <li><a href="cegek/referenciak">Referenciák</a></li>
                                                                                            <li><a href="cegek/szolgaltatasaink">Szolgáltatásaink</a></li>
                                                                                            <li><a href="cegek/szemelyzeti-tanacsadas">Személyzeti tanácsadás</a></li>
                                                                                        </ul> -->
                                        </li>
                                        <li>
                                            <a class="no_arrow <?php echo ($this->registry->controller == 'kapcsolat' && $this->registry->action == 'index') ? 'active' : ''; ?>" href="kapcsolat">Kapcsolat</a>
                                        </li>


                                        <?php if ($logged_in === true) { ?>
                                            <li class="menuparent">
                                                <span class="menuparent nolink <?php echo (($this->registry->controller == 'profil' && $this->registry->action == 'index')) || ($this->registry->controller == 'eloregisztracio' && $this->registry->action == 'index') ? 'active' : ''; ?>"><i class="fa fa-user"></i> Fiókom</span>
                                                <ul>
                                                    <li><a href="profil">Profilom</a></li>
                                                    <li><a href="eloregisztracio">Adatlap</a></li>

                                                </ul>
                                            </li>
                                        <?php } ?> 

                                    </ul><!-- /.nav -->


                                    <!--
                                                                                                    <button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_login" id="modal_login_trigger">Bejelentkezés</button>
                                                                                                    <button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_subscribe" id="modal_subscribe_trigger">Feliratkozás hírlevélre</button>
                                                                                                    <button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_register" id="modal_register_trigger">Regisztrálj!</button>
                                    -->                                  
                                                                                                    <!-- <a style="margin-left:10px;" class="btn btn-secondary arrow-right pull-right" href="<?php //echo BASE_URL . 'feliratkozas';   ?>">Feliratkozás hírlevélre</a> -->
                                    <!-- <a class="btn btn-secondary arrow-right pull-right">Regisztrálj!</a> -->


                                </div><!-- /.navigation -->
                            </div><!-- /.navigation-wrapper -->
                        </div><!-- /.container -->
                    </div><!-- /.navigation -->

                    <!-- MODAL SUBSCRIBE -->	
                    <?php include('system/site/view/_template/tpl_subscribe_modal.php'); ?>
                    <!-- MODAL SUBSCRIBE END -->		
                    <!-- MODAL LOGIN -->	
                    <?php include('system/site/view/_template/tpl_login_modal.php'); ?>
                    <!-- MODAL LOGIN END -->
                    <!-- MODAL REGISTER -->	
                    <?php include('system/site/view/_template/tpl_register_modal.php'); ?>
                    <!-- MODAL REGISTER END -->
                    <!-- MODAL NOWWORK -->	
                    <?php include('system/site/view/_template/tpl_nowwork_modal.php'); ?>
                    <!-- MODAL NOWWORK END -->
                    <!-- MODAL REGISTRATION INFO -->	
                    <?php include('system/site/view/_template/tpl_registration_info_modal.php'); ?>
                    <!-- MODAL REGISTRATION INFO END -->                    