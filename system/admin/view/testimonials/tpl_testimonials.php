<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
				<!-- BEGIN PAGE HEADER-->
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Rólunk mondták <small>szerkesztése</small>
					</h3>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<i class="fa fa-home"></i>
								<a href="admin/home">Kezdőoldal</a> 
								<i class="fa fa-angle-right"></i>
							</li>
							<li><a href="#">Rólunk mondták szerkesztése</a></li>
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
								<div class="caption"><i class="fa fa-file"></i>Rólunk mondták</div>
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

								<div class="table-toolbar">
									<div class="row">
										<div class="col-md-6">	
											<div class="btn-group">
												<a class="btn blue" href="admin/testimonials/new_testimonial">
												Új vélemény hozzáadása <i class="fa fa-plus-circle"></i>
												</a>
											</div>
										</div>	
										<div class="col-md-6">
											<div class="btn-group pull-right">
												<button class="btn dropdown-toggle" data-toggle="dropdown">Eszközök <i class="fa fa-angle-down"></i>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" id="print_page">Nyomtatás</a></li>
													<li><a href="#">Mentés PDF</a></li>
													<li><a href="#">Mentés Excel</a></li>
												</ul>
											</div>
										</div>	
									</div>	
								</div>							
								<table class="table table-striped table-bordered table-hover" id="content">
									<thead>
										<tr class="heading">
											<th>#id</th>
											<th>Vélemény</th>
											<th style="width:150px">Név</th>
											<th>Beosztás</th>
											<th style="width:110px"></th>
										</tr>
									</thead>
									<tbody>

							<?php foreach($all_testimonials as $value) { ?>
										<tr class="odd gradeX">
											<td><?php echo $value['id'];?></td>
											<td><?php echo $value['text'];?></td>
											<td><?php echo $value['name'];?></td>
											<td><?php echo $value['title'];?></td>
												
											<td>
												<div class="actions">
													<div class="btn-group">
														<a class="btn btn-sm green" href="#" data-toggle="dropdown">
															<i class="fa fa-cogs"></i> Műveletek
															<i class="fa fa-angle-down"></i>
														</a>
														<ul class="dropdown-menu pull-right">
															<li><a href="admin/testimonials/edit/<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Szerkeszt</a></li>
															<li><a href="admin/testimonials/delete/<?php echo $value['id'];?>" id="delete_<?php echo $value['id'];?>"><i class="fa fa-trash"></i> Töröl</a></li>
														</ul>
													</div>
												</div>
											</td>
										</tr>

							<?php } ?>					

									</tbody>
								</table>
							</div> <!-- END USER GROUPS PORTLET BODY-->
						</div> <!-- END USER GROUPS PORTLET-->
				</div> <!-- END COL-MD-12 -->
			</div> <!-- END ROW -->	
		</div> <!-- END PAGE CONTENT-->    
	</div> <!-- END PAGE CONTENT WRAPPER -->
</div> <!-- END CONTAINER -->