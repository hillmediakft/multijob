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
                    <h1 class="page-header">Kilépési feltételek</h1>
					<hr/>
					<div class="content-box">
						<?php echo $content['page_body']; ?>
					</div>
               
                    <hr/>   
                   
                    <div style="margin-top:30px;">
                        <form method="post" action="" id="kilepes_form">
                            
                            <div class="control-group">
                                <label class="control-label" for="name">
                                    Név
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="name">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
                            
                            <div class="control-group">
                                <label class="control-label" for="mother_name">
                                    Anyukád neve
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="mother_name">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
                            
                            <div class="control-group">
                                <label class="control-label" for="birth_time">
                                    Születési idő
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="birth_time">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
                            
                            <div class="control-group">
                                <label class="control-label" for="tax_id">
                                    Adószám
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="tax_id">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
                               
                            <div class="control-group">
                                <label class="control-label" for="bank_account_number">
                                    Bankszámlaszám
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" name="bank_account_number">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
                            
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Kilépési adatok küldése">
                            </div><!-- /.form-actions -->
                            
                        </form>    
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