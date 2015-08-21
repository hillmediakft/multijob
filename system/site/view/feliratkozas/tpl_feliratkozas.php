<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo BASE_URL;?>">
    <title>Multijob - hitelesítés</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo SITE_CSS;?>bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_CSS;?>bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS;?>plugins/chosen/chosen.css" type="text/css">
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
										<li>&nbsp;</li>		
							<!-- 
										<li><a data-toggle="modal" data-target="#modal_login" href="javascript:;">Bejelentkezés</a></li>
										<li><a data-toggle="modal" data-target="#modal_register" href="javascript:;">Regisztráció</a></li>
							-->
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
													<?php echo Util::safe_mailto($settings['email']);?>
												</div><!-- /.site-email -->

												<div class="site-phone">
													<span><?php echo $settings['tel']?></span>
												</div><!-- /.site-phone -->
											</div><!-- /.info -->

										</div><!-- /.row -->
									</div><!-- /.navbar-inner -->
								</div><!-- /.navbar -->
							
							
							
							</div><!-- /.container -->
						</div><!-- /#header-inner -->
					</div><!-- /#header -->
				</div><!-- /#header-wrapper -->


		<!-- MODAL LOGIN -->	
		<?php include('system/site/view/_template/tpl_login_modal.php');?>
		<!-- MODAL LOGIN END -->
		<!-- MODAL REGISTER -->	
		<?php include('system/site/view/_template/tpl_register_modal.php');?>
		<!-- MODAL REGISTER END -->

		<!-- TARTALOM -->
		<div class="container">
			<div class="row text-center">
				<h2>Feliratkozás visszaigazolás</h2>
				<br />
				<p><?php echo $message; ?></p>
				<br />
				<a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Vissza a főoldalra</a>
			</div>
		</div>


			</div><!-- /#wrapper-inner -->
		</div><!-- /#wrapper-->
	</div><!-- /#wrapper-outer -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>jquery.js"></script>
<!-- <script type="text/javascript" src="<?php //echo SITE_JS; ?>jquery.ezmark.js"></script> -->
<script type="text/javascript" src="<?php echo SITE_JS; ?>bootstrap.min.js"></script>
<!--
<script type="text/javascript" src="<?php //echo SITE_JS; ?>retina.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>realia.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>jquery.currency.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>jquery.cookie.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>carousel.js"></script>
<script type="text/javascript" src="<?php //echo SITE_ASSETS; ?>plugins/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php //echo SITE_ASSETS; ?>plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>gmap3.min.js"></script>
<script type="text/javascript" src="<?php //echo SITE_JS; ?>gmap3.infobox.min.js"></script>
<script type="text/javascript" src="<?php //echo SITE_ASSETS; ?>plugins/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?php //echo SITE_ASSETS; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
-->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php
if (isset($this->js_link)) {
    foreach ($this->js_link as $value) {
        echo $value;
    }
}
?>

<script type="text/javascript">
/*
$(document).ready(function() {    
	$('input[type="checkbox"]').ezMark();
});
*/
</script>

</body>
</html>