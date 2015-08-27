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

                        <h2><i class="fa fa-info-circle fa-fw"></i> <?php echo $job_data['job_title']; ?></h2>
						<table class="table table-striped">
							<tbody>
								<tr>                        
									<td><i class="fa fa-cogs fa-fw"></i><strong> Munka típusa: </strong></td>
									<td><?php echo $job_data['job_list_name']; ?></td>
								</tr>
								<tr>                        
									<td><i class="fa fa-file fa-fw"></i> <strong>Leírás: </strong></td>
									<td><?php echo $job_data['job_description']; ?></td>
								</tr>
						</tbody>
						</table>


                        <p>
                            <i class="fa fa-clock-o fa-fw"></i><strong>Diákmunka ideje: </strong><?php echo $job_data['job_working_hours']; ?>
                        </p>
                        <p>
                            <i class="fa fa-money fa-fw"></i> <strong>Fizetés: </strong><?php echo $job_data['job_pay']; ?>
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-fw"></i> <strong>Munkavégzés helye: </strong>
                            <?php if($job_data['county_name'] == 'Budapest') {
                                echo 'Budapest, ' . $job_data['district_name'] . ' kerület';
                            } else {
                                echo $job_data['city_name'];
                            }
                            ?>
                        </p>


                        <?php if(!empty($job_data['job_conditions'])) { ?>
                        <p>
                            <i class="fa fa-exclamation-triangle fa-fw"></i> <strong>Munka feltételek: </strong>
                        </p>
                        <div>
                            <?php echo $job_data['job_conditions']; ?>
                        </div>
                        <?php } ?>

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