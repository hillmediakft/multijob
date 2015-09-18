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
                    <h1 class="page-header">Cégbemutató</h1>
					<hr/>
                                        
    <div class="hero-unit">
      <h1><i class="fa fa-file-o"></i>  Ajánlatkérés</h1>
      <p>Ha ajánlatot szeretne kérni, kérjük az alábbiakban írja meg, és mi 24 órán belül árajánlatot küldünk Önnek ill. visszahívjuk Önt!
Minden mezőt kérünk kitölteni!</p>
      <p>
        <a class="btn btn-primary" data-toggle="modal" data-target="#modal_email" href="#">Ajánlatkérés</a>
      </p>
    </div>                                        
                                        
                                        
                                        
					
					<div class="content-box">
						<?php echo $content['page_body']; ?>
					</div>
                </div>
                <div class="sidebar span3">
					<?php include('system/site/view/_template/tpl_sidebar.php'); ?>                  
                </div>
            </div>
    
        </div>
    </div>

	
</div><!-- /#content -->
	
	
</div><!-- /#wrapper-inner -->

 <!-- MODAL EMAIL -->	
<?php include('system/site/view/cegek/tpl_email_modal.php'); ?>
                    <!-- MODAL EMAIL END -->