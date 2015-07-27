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
                    
                    <h1 class="page-header">Munkák</h1>
                    
                    <div class="properties-grid">
                        <div class="row">

							<?php
							if(!empty($jobs_data)) {
								foreach($jobs_data as $value) { ?>
								<div class="property span3">
									<div class="image">
										<div class="content">
											<a href="munka/<?php echo Replacer::filterName($value['job_title']);?>/<?php echo $value['job_id'];?>"></a>
											<img src="<?php echo Config::get('jobphoto.upload_path') . $value['job_list_photo'];?>" alt="">
										</div><!-- /.content -->

										<div class="price"><?php echo $value['job_pay']; ?></div><!-- /.price -->
										<div class="reduced"><?php echo $value['job_list_name']; ?></div><!-- /.reduced -->
									</div><!-- /.image -->

									<div class="title">
										<h2><a href="munka/<?php echo Replacer::filterName($value['job_title']);?>/<?php echo $value['job_id'];?>"><?php echo $value['job_title']; ?></a></h2>
									</div><!-- /.title -->

									<div class="location">
										<?php 
										$location = $value['city_name'];
										if(!empty($value['district_name'])){
											$location .=', ' . $value['district_name'] . ' kerület'; 
										}
										echo $location;
										?>
									</div><!-- /.location -->
								</div><!-- /.property -->
							<?php 
								}
							} else { ?>
								<div class="span9">
									<h2 class="text-center">Nincs találat</h2>
								</div>
							<?php } ?>
							
                        </div><!-- /.row -->
                    </div><!-- /.properties-grid -->

					<div class="pagination pagination-centered">
						<?php echo $pagine_links; ?>
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
