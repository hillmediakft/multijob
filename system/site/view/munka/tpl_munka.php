<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">

			<div class="row">
				<div class="span12">
					<div id="feedback_message">
						<?php $this->renderFeedbackMessages(); ?>
					</div>
				</div>
			</div>		
		
	        <div class="row">
                <div class="span9">
					
                    <h1 class="page-header">Munka részletek</h1>
					
                    <div class="job-detail">

                   <!--      <div class="pull-right overview-right">
                            <div class="row">
                                <div class="span4">
                                    <h2>Munkaadó adatai</h2>

                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Cég neve:</th>
                                                <td><?php echo $job_data['employer_name']; ?></td>
                                            </tr>
                                            <?php if(!empty($job_data['employer_contact_person'])) { ?>   
                                            <tr>
                                                <th>Kapcsolat:</th>
                                                <td><?php echo $job_data['employer_contact_person']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if(!empty($job_data['employer_contact_tel'])) { ?>
                                            <tr>
                                                <th>Telefon:</th>
                                                <td><?php echo $job_data['employer_contact_tel']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if(!empty($job_data['employer_contact_email'])) { ?>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?php echo $job_data['employer_contact_email']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            
                        </div>	-->

                        <h2><i class="fa fa-check-square"></i> <?php echo $job_data['job_title']; ?></h2>
						<table class="table table-striped">
							<tbody>
								<tr>                        
									<td><i class="fa fa-cogs fa-fw"></i><strong> Kategória: </strong></td>
									<td><?php echo $job_data['job_list_name']; ?></td>
								</tr>
								<tr>                        
									<td><i class="fa fa-file fa-fw"></i> <strong> Leírás: </strong></td>
									<td><?php echo $job_data['job_description']; ?></td>
								</tr>
								<tr>                        
									<td><i class="fa fa-clock-o fa-fw"></i><strong> Munka ideje: </strong></td>
									<td><?php echo $job_data['job_working_hours']; ?></td>
								</tr>						
								<tr>                        
									<td><i class="fa fa-money fa-fw"></i> <strong> Fizetés: </strong></td>
									<td><?php echo $job_data['job_pay']; ?></td>
								</tr>
								<tr>                        
									<td><i class="fa fa-map-marker fa-fw"></i> <strong> Helye: </strong></td>
									<td><?php if($job_data['county_name'] == 'Budapest') {
                                echo 'Budapest, ' . $job_data['district_name'] . ' kerület';
                            } else {
                                echo $job_data['city_name'];
                            }
                            ?></td>
								</tr>
								
							<?php if(!empty($job_data['job_conditions'])) { ?>	
								<tr>                        
									<td> <i class="fa fa-exclamation-triangle fa-fw"></i> <strong>Feltételek: </strong></td>
									<td> <?php echo $job_data['job_conditions']; ?></td>
								</tr>
							<?php } ?>	
							
								
								
						</tbody>
						</table>
						

						
						<div class="widget our-agents">
							<div class="content">
								<div class="agent">
								
								<p>A részletekkel kapcsolatban keresd kollégánkat:</p>
									<div class="image">
										<img alt="" src="public/site_assets/image/photos/agent.png">
									</div><!-- /.image -->
									<div class="name"> Gipsz jakab</div><!-- /.name -->
									<div class="phone"><i class="fa fa-phone fa-fw"></i> 333-666-777</div><!-- /.phone -->
									<div class="email"><i class="fa fa-envelope fa-fw"></i> <a href="mailto:jakab@example.com">jakab@example.com</a></div><!-- /.email -->
								</div><!-- /.agent -->


							</div>
						</div>

                    <br /><br />
                    <button class="btn btn-primary" type="button" name="jelentkezes">Jelentkezés</button>

                    </div>	
					

                </div>
                <div class="sidebar span3">
          			<!-- KERESŐ DOBOZ -->
					<?php include('system/site/view/_template/tpl_sidebar_search.php'); ?>                  
          			<!-- KOLLÉGÁINK DOBOZ -->
					<?php include('system/site/view/_template/tpl_sidebar_kollegaink.php'); ?>   
                </div>
            </div>
    
        </div>
    </div>


</div><!-- /#content -->

</div><!-- /#wrapper-inner -->