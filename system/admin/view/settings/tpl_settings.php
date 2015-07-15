<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
				<!-- BEGIN PAGE HEADER-->
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Beállítások <small>kezelése</small>
					</h3>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="admin/home">Kezdőoldal</a> 
								<i class="fa fa-angle-right"></i>
							</li>
							<li><a href="#">Beállítások</a></li>
						</ul>
					</div>
					<!-- END PAGE TITLE & BREADCRUMB-->
				<!-- END PAGE HEADER-->
		
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

						<!-- echo out the system feedback (error and success messages) -->
						<?php $this->renderFeedbackMessages(); ?>

						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption"><i class="fa fa-cogs"></i>Beállítások szerkesztése</div>
								<!--
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
								-->
							</div>
							<div class="portlet-body">


<form action='' name='settings_form' id='settings_form' method='POST'>

	<div class="form-group">
		<label for="settings_ceg">Cég</label>	
		<input type='text' name='setting_ceg' class='form-control input-large' value="<?php echo (empty($settings)) ? "" : $settings[0]['ceg']; ?>"/>
	</div>
	
	<div class="form-group">
		<label for="settings_cim">Cím</label>	
		<input type='text' name='setting_cim' class='form-control input-large' value="<?php echo (empty($settings)) ? "" : $settings[0]['cim']; ?>"/>
	</div>
	
	<div class="form-group">
		<label for="settings_tel">Telefonszám</label>	
		<input type='text' name='setting_tel' class='form-control input-large' value="<?php echo (empty($settings)) ? "" : $settings[0]['tel']; ?>"/>
	</div>

	<div class="form-group">
		<label for="settings_email">E-mail</label>	
		<input type='text' name='setting_email' class='form-control input-large' value="<?php echo (empty($settings)) ? "" : $settings[0]['email']; ?>"/>
	</div>

	
	<input class='btn green submit' type='submit' name='submit_settings' value='Mentés' />

</form>
								
								
								
							</div> <!-- END USER GROUPS PORTLET BODY-->
						</div> <!-- END USER GROUPS PORTLET-->
				</div> <!-- END COL-MD-12 -->
			</div> <!-- END ROW -->	
		</div> <!-- END PAGE CONTENT-->    
	</div> <!-- END PAGE CONTENT WRAPPER -->
</div> <!-- END CONTAINER -->