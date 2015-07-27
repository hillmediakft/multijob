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
                    
					<div class="property-detail">
					
						<h1><?php echo $job_data['job_title']; ?></h1>
						
						<p>
							<strong>Diákmunka ideje: </strong><?php echo $job_data['job_description']; ?>
						</p>
						<p>
							<strong>Diákmunka ideje: </strong><?php echo $job_data['job_description']; ?>
						</p>
						<p>
							<strong>Fizetés: </strong><?php echo $job_data['job_pay']; ?>
						</p>
						
						<h2>Munka feltételek</h2>
						
						<div class="row">
							<div class="span4">
								<?php echo $job_data['job_conditions']; ?>
							</div>
						</div>
					
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