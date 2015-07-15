<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
				<!-- BEGIN PAGE HEADER-->
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Oldal <small>szerkesztése</small>
					</h3>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="admin/home">Kezdőoldal</a> 
								<i class="fa fa-angle-right"></i>
							</li>
							<li><a href="#">Oldal szerkesztése</a></li>
						</ul>
					</div>
					<!-- END PAGE TITLE & BREADCRUMB-->
				<!-- END PAGE HEADER-->

			
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

						<div class="row">
							<div class="col-lg-12 margin-bottom-20">
								<a class ='btn btn-default' href='admin/pages'><i class='fa fa-arrow-left'></i>  Vissza az oldalakhoz</a>
							</div>
						</div>	

						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet">

							<div class="portlet-body">



									
<h2 class='cim1'><?php echo $data_arr[0]['page_title'];?> oldal szerkesztése</h2>
<br />
<form action='' name='update_pages_form' id="update_pages_form" method='POST'>
	
	<input type="hidden" name="page_id" id="page_id" value="<?php echo $data_arr[0]['page_id'] ?>">
	
	<div class="form-group">
		<label for="page_title">Az oldal neve</label>	
		<input type='text' name='page_title' class='form-control' value="<?php echo $data_arr[0]['page_title'] ?>" disabled=''>
	</div>
	
	<div class="form-group">
		<label for="page_metatitle">Az oldal címe</label>	
		<input type='text' name='page_metatitle' class='form-control' value="<?php echo $data_arr[0]['page_metatitle'] ?>"/>
	</div>
	
	<div class="form-group">
		<label for="page_metadescription">Az oldal leírása</label>	
		<input type='text' name='page_metadescription' class='form-control' value="<?php echo $data_arr[0]['page_metadescription'] ?>">
	</div>
	
	<div class="form-group">
		<label for="page_metakeywords">Kulcsszavak</label>
		<input type='text' name='page_metakeywords' class='form-control' value="<?php echo $data_arr[0]['page_metakeywords'] ?>">
	</div>
	
	<div class="form-group">
		<label for="page_body">Tartalom</label>
		<textarea type='text' name='page_body' class='form-control'><?php echo $data_arr[0]['page_body'] ?></textarea>
	</div>
	

		<input class="btn green submit" type="submit" name="submit_update_page" value="Mentés">
		
</form>									

							</div> <!-- END USER GROUPS PORTLET BODY-->
						</div> <!-- END USER GROUPS PORTLET-->
				</div> <!-- END COL-MD-12 -->
			</div> <!-- END ROW -->	
		</div> <!-- END PAGE CONTENT-->    
	</div> <!-- END PAGE CONTENT WRAPPER -->
</div> <!-- END CONTAINER -->