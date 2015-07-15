<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL;?>">
    <title>Multijob</title>
    

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo SITE_CSS;?>bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_CSS;?>bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS;?>plugins/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS;?>plugins/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS;?>plugins/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_CSS;?>realia-blue.css" type="text/css" id="color-variant-default">
  
	

	<!-- OLDALSPECIFIKUS CSS LINKEK -->
	<?php if(isset($this->css_link)){
		foreach($this->css_link as $value) { echo $value; }
	} ?>
		
		
</head>
<body>
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
                                    <?php if(Session::get('user_site_logged_in')) {?>
										<li><a href="eloregisztracio">Előregisztráció</a></li>
                                    <?php }?>
									
									<li><a data-toggle="modal" data-target="#modal_subscribe" href="javascript:;">Feliratkozás hírlevélre</a></li>
                                    <li><a data-toggle="modal" data-target="#modal_register" href="javascript:;">Regisztráció</a></li>
                                    
									<?php if(Session::get('user_site_logged_in')){ ?>
										<li><span>Bejelentkezve <?php echo Session::get('user_site_name');?>&nbsp; &raquo; </span><a style="float: left; padding-left: 0px;" href="felhasznalok/kijelentkezes">Kijelentkezés</a></li>
									<?php } else { ?>
										<li><a data-toggle="modal" data-target="#modal_login" href="javascript:;">Bejelentkezés</a></li>
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
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="#" title="Home">
                                                    <img src="<?php echo SITE_IMAGE;?>logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

 

                                            <div class="site-slogan">
                                                <span>Munkalehetőségek<br>diákoknak</span>
                                            </div><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:<?php echo $settings['email'];?>"><?php echo $settings['email'];?></a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <span><?php echo $settings['tel']?></span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                        <a class="btn btn-primary btn-large list-your-property arrow-right" href="#">Most akarok dolgozni!</a>
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
                                <li class="menuparent">
                                    <span class="menuparent nolink active">Munkáink</span>
                                    <ul>
                                        <li><a href="#">Menü 1</a></li>
                                        <li><a href="index.html">Menü 2</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Rólunk</a>
  
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Feltételek</span>
                                    <ul>
                                        <li><a href="#">Menü 1</a></li>
                                        <li><a href="#">Menü 2</a></li>

                                    </ul>
                                </li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">Cégeknek</span>
                                    <ul>
                                        <li><a href="#">Menü 1</a></li>
                                        <li><a href="#">Menü 2</a></li>

                                    </ul>
                                </li>
                                <li><a href="#">Kapcsolat</a></li>
                            </ul><!-- /.nav -->


<!--
								<button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_login" id="modal_login_trigger">Bejelentkezés</button>
								<button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_subscribe" id="modal_subscribe_trigger">Feliratkozás hírlevélre</button>
								<button type="button" class="btn btn-secondary arrow-right pull-right" data-toggle="modal" data-target="#modal_register" id="modal_register_trigger">Regisztrálj!</button>
-->                                  
								<!-- <a style="margin-left:10px;" class="btn btn-secondary arrow-right pull-right" href="<?php //echo BASE_URL . 'feliratkozas';?>">Feliratkozás hírlevélre</a> -->
                                <!-- <a class="btn btn-secondary arrow-right pull-right">Regisztrálj!</a> -->


                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

			<!-- MODAL SUBSCRIBE -->	
			<?php include('system/site/view/_template/tpl_subscribe_modal.php');?>
			<!-- MODAL SUBSCRIBE END -->		
			<!-- MODAL LOGIN -->	
			<?php include('system/site/view/_template/tpl_login_modal.php');?>
			<!-- MODAL LOGIN END -->
			<!-- MODAL REGISTER -->	
			<?php include('system/site/view/_template/tpl_register_modal.php');?>
			<!-- MODAL REGISTER END -->