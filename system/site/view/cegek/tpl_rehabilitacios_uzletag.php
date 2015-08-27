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
                    <h1 class="page-header">Rehabilitációs üzletág</h1>
					<hr/>
					
					<div class="content-box">
						<?php echo $content['page_body']; ?>
					</div>
                </div>
                <div class="sidebar span3">
          			<!-- KERESŐ DOBOZ -->
					<?php include('system/site/view/_template/tpl_sidebar.php'); ?>                  
          			<!-- KOLLÉGÁINK DOBOZ 
					<?php // include('system/site/view/_template/tpl_sidebar_kollegaink.php'); ?>  --> 
                </div>
            </div>
    
        </div>
    </div>

	
</div><!-- /#content -->
	
	
</div><!-- /#wrapper-inner -->