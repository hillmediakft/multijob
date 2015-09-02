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
		
		
				

    <div class="container">
        <div id="main">
            <div class="row">
                <div class="span8">
                     <h1 class="page-header">Kapcsolat</h1>
                        
						<div class="content-box">
						<?php echo $content['page_body']; ?>
					</div>
						
						<iframe class="map" width="425" height="350" src="https://maps.google.com/maps?q=47.513263,19.048415&amp;num=1&amp;ie=UTF8&amp;ll=47.513263,19.048415&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>

                        <h2>Küldj üzenetet!</h2>

                        <form method="post" class="contact-form" action="?">
                            <div class="name control-group">
                                <label class="control-label" for="inputContactName">
                                    Név
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputContactName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="email control-group">
                                <label class="control-label" for="inputContactEmail">
                                    E-mail
                                    <span class="form-required" title="Kötelező kitölteni.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputContactEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputContactMessage">
                                    Üzenet
                                    <span class="form-required" title="Kötelező kitölteni.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputContactMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Küldés">
                            </div><!-- /.form-actions -->
                        </form>
                </div>

                <div class="sidebar span4">
                    <div class="widget properties last">
    <div class="title">
        <h2>Elérhetőségek</h2>
    </div><!-- /.title -->

    <div class="content">
                               <div class="row">
                            <div class="span3">
                                <h3 class="address">Központi iroda</h3>
                                <p class="content-icon-spacing">
                                    <?php echo $settings['cim'];?>
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="call-us">Telefon</h3>
                                <p class="content-icon-spacing">
                                    <?php echo $settings['tel'];?>
                                    
                                </p>
                            </div>
                            <div class="span3">
                                <h3 class="email">E-mail</h3>
                                <p class="content-icon-spacing">
                                    <?php echo Util::safe_mailto($settings['email']);?>
                                </p>
                            </div>
                        </div>


    </div><!-- /.content -->
</div><!-- /.properties -->

                </div>
           
        </div>
    </div>
    </div><!-- /#content -->








				

            </div>
    
        </div>
    </div>

	
</div><!-- /#content -->
	
	
</div><!-- /#wrapper-inner -->