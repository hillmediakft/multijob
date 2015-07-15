<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<!-- 
			<h3 class="page-title">
				Felhasználók <small>kezelése</small>
			</h3>
			-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="admin/home">Kezdőoldal</a> 
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<span>Felhasználók</span>
					</li>
				</ul>
			</div>
			<!-- END PAGE TITLE & BREADCRUMB-->
		<!-- END PAGE HEADER-->
			
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

				<!-- KERESŐ DOBOZ 
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-search"></i>Keresés</div>
								<div class="tools">
									<a class="expand" href="javascript:;" data-original-title="" title=""> </a>
								</div>
						</div>
						<div class="portlet-body form" id="search-portlet" style="display:none;">

							<form class="horizontal-form" method="POST" id="users_search_form" action="admin/users">
								<div class="form-body">
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Felhasználó név</label>
												<input type="text" placeholder="" class="form-control input-sm" name="firstName" id="firstName">
											</div>
										</div>
							
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Név</label>
												<input type="text" placeholder="" class="form-control input-sm" name="lastName" id="lastName">
											</div>
										</div>
							
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">E-mail</label>
												<input type="text" placeholder="" class="form-control input-sm" name="email"id="email">
											</div>
										</div>
								
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Telefon</label>
												<input type="text" placeholder="" class="form-control input-sm" id="phone" id="phone">
											</div>
										</div>
						
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Jogosultság</label>
												<select name="user_role" id="user_role" class="form-control input-sm">
													<option value="">válasszon</option>
													<option value="1">Szuper admin</option>
													<option value="2">Admin</option>
													<option value="3">User</option>
												</select>
											</div>
										</div>
							
										<div class="col-md-2">
											<div class="form-group">
												<label class="control-label">Státusz</label>
												<select name="user_status" id="user_status" class="form-control input-sm">
													<option value="">válasszon</option>
													<option value="1">Aktív</option>
													<option value="0">Inaktív</option>
												</select>
											</div>
										</div>
									</div>
						
								</div>
								<div class="form-actions right">
									<button class="btn default" id="reset_search_form" type="button">Törlés</button>
									<button class="btn blue" name="search_submit" type="submit"><i class="fa fa-check"></i> Keresés</button>
								</div>
							</form>

						</div>
					</div>
				KERESŐ DOBOZ VÉGE -->	
					
						
						
				<!-- ÜZENETEK -->
				<div id="ajax_message">
					<div class="alert alert-success" style="display:none;"></div>
					<div class="alert alert-danger" style="display:none;"></div>
				</div> 						
				<?php $this->renderFeedbackMessages(); ?>				
						
				
				<form class="horizontal-form" id="del_user_form" method="POST" action="admin/users/delete_user">	
								
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-user"></i>Felhasználók</div>
							
								<div class="actions">
									<a href="admin/users/new_user" class="btn blue btn-sm"><i class="fa fa-plus"></i> Új felhasználó</a>
									<button class="btn red btn-sm" name="del_user_submit" type="submit"><i class="fa fa-trash"></i> Csoportos törlés</button>
									<div class="btn-group">
										<a data-toggle="dropdown" href="#" class="btn btn-sm default">
											<i class="fa fa-wrench"></i> Eszközök <i class="fa fa-angle-down"></i>
										</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="#" id="print_users"><i class="fa fa-print"></i> Nyomtat </a>
												</li>
												<li>
													<a href="#" id="export_users"><i class="fa fa-file-excel-o"></i> Export CSV </a>
												</li>
											</ul>
									</div>
								</div>

						</div>
						<div class="portlet-body">

<!-- *************************** USERS TÁBLA *********************************** -->						
				
							<table class="table table-striped table-bordered table-hover" id="users">
								<thead>
									<tr>
										<th class="table-checkbox">
											<input type="checkbox" class="group-checkable" data-set="#users .checkboxes"/>
										</th>
										<th></th>
										<th>Felh.</th>
										<th>Név</th>
										<th>E-mail</th>
										<th>Telefon</th>
										<th>Jogosultság</th>
										<th>Státusz</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($all_user as $value) { ?>
									<tr class="odd gradeX">
										<td>
										<?php if (($value['user_role_id'] != 1) && Session::get('user_role_id') < $value['user_role_id']) { ?>
											<input type="checkbox" class="checkboxes" name="user_id_<?php echo $value['user_id']; ?>" value="<?php echo $value['user_id']; ?>"/>
										<?php } ?>	
										</td>
										<td><img src="<?php echo Config::get('user.upload_path') . $value['user_photo']; ?>" width="60" height="60"/></td>
										<td><?php echo $value['user_name'];?></td>
										<td><?php echo $value['user_first_name'] . ' ' .  $value['user_last_name'];?></td>
										<td><a href="mailto:shuxer@gmail.com"><?php echo $value['user_email'];?> </a></td>
										<td><?php echo $value['user_phone'];?></td>
										<td><?php echo $value['role_name'];?></td>
										<?php if($value['user_active'] == 1){ ?>
											<td><span class="label label-sm label-success">Aktív</span></td>
										<?php } ?>
										<?php if($value['user_active'] == 0){ ?>
											<td><span class="label label-sm label-danger">Inaktív</span></td>
										<?php } ?>
										<td>									
											<div class="actions">
												<div class="btn-group">
													<a class="btn btn-sm green" href="#" data-toggle="dropdown" <?php echo (($value['user_role_id'] == 1) || Session::get('user_role_id') == $value['user_role_id']) ? 'disabled' : '';?>>
														<i class="fa fa-cogs"></i> Műveletek
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														
														<?php if (($value['user_role_id'] != 1) && Session::get('user_role_id') < $value['user_role_id']) : ?>	
														<li><a href="#"><i class="fa fa-pencil"></i> Szerkeszt</a></li>
														<?php endif; ?>
														
														<?php if (($value['user_role_id'] != 1) && Session::get('user_role_id') < $value['user_role_id']) : ?>
							
														<li><a href="<?php echo $this->registry->site_url . 'users/delete_user/' . $value['user_id'];?>" id="delete_user_<?php echo $value['user_id'];?>"> <i class="fa fa-trash"></i> Töröl</a></li>
														<?php endif; ?>
														
													<?php if (($value['user_role_id'] != 1) && Session::get('user_role_id') < $value['user_role_id']) { ?>	
														<?php if($value['user_active'] == 1){ ?>
														<li><a rel="<?php echo $value['user_id'];?>" href="javascript:;" id="make_inactive_<?php echo $value['user_id'];?>" data-action="make_inactive"><i class="fa fa-ban"></i> Blokkol</a></li>
														<?php } ?>
														<?php if($value['user_active'] == 0){ ?>
														<li><a rel="<?php echo $value['user_id'];?>" href="javascript:;" id="make_active_<?php echo $value['user_id'];?>" data-action="make_active"><i class="fa fa-check"></i> Aktivál</a></li>
														<?php } ?>
													<?php } ?>	
													</ul>
												</div>
											</div>
										</td>
									</tr>
									<?php } ?>	
								</tbody>
							</table>	

						</div>
					</div>
				</form>					
						<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
		<div id="loadingDiv" style="display:none;"><img src="public/admin_assets/img/loader.gif"></div>	
		</div><!-- END PAGE CONTAINER-->    
	</div><!-- END PAGE CONTENT WRAPPER -->
</div><!-- END CONTAINER -->