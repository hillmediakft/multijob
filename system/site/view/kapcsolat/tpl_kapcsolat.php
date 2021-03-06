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
                <div class="span8">
                     <h1 class="page-header">Kapcsolat</h1>
                        
						<div class="content-box">
						    <?php echo $content['page_body']; ?>
					    </div>
                     
                     
                     <div id="map_canvas" style="height: 400px;"></div>
						
					<!--	<iframe class="map" width="425" height="350" src="https://maps.google.com/maps?q=47.513263,19.048415&amp;num=1&amp;ie=UTF8&amp;ll=47.513263,19.048415&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe> -->

                       
                        <div id="msg_send_message" style="margin-top:20px;">
                            <div class="alert alert-success" style="display:none;"></div>
                            <div class="alert alert-danger" style="display:none;"></div>
                        </div>   
                                              
                        <h2>Küldj üzenetet!</h2>

                        <form method="post" class="contact-form" action="" id="contact_email_send_form">
                            <div class="name control-group">
                                <label class="control-label" for="from_name">Név <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                <div class="controls">
                                    <input type="text" name="from_name" id="from_name" required >
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="email control-group">
                                <label class="control-label" for="from_email">E-mail <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                <div class="controls">
                                    <input type="text" name="from_email" id="from_email" required >
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="message">Üzenet <span class="form-required" title="Kötelező kitölteni.">*</span></label>
                                <div class="controls">
                                    <textarea id="message" name="message" required ></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <input type="hidden" value="diak" name="area">
                           
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Küldés">
                            </div><!-- /.form-actions -->
                        </form>
                </div>

                <div class="sidebar span4">
                   
                    <div class="widget properties last">
                        <div class="title">
                            <h2>Irodáink</h2>
                        </div><!-- /.title -->

                        <div class="content">

                            <div class="offices">

                                <div class="accordion" id="accordion2">
                                    <?php
                                    $counter = 1;
                                    foreach($offices as $key => $value){ ?>

                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle <?php echo ($counter == 1) ? 'active' : ''; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php echo $counter; ?>" data-latitude="<?php echo $value['office_latitude'];?>" data-longitude="<?php echo $value['office_longitude'];?>">
                                                <span class="sign"></span> <?php echo $value['office_name'];?>
                                            </a>
                                        </div>
                                        <div id="collapse_<?php echo $counter; ?>" class="accordion-body collapse <?php echo ($counter == 1) ? 'in' : ''; ?>">
                                            <div class="accordion-inner">

                                                <h3 class="address">Cím</h3>
                                                <p class="content-icon-spacing">
                                                    <?php echo $value['office_address'];?>
                                                </p>

                                                <?php if(!empty($value['office_telefon'])){ ?>
                                                    <h3 class="call-us">Telefon</h3>
                                                    <p class="content-icon-spacing">
                                                        <?php echo $value['office_telefon'];?>
                                                    </p>
                                                <?php } ?>

                                                <?php if(!empty($value['office_mobil'])){ ?>
                                                    <h3 class="call-us">Mobil</h3>
                                                    <p class="content-icon-spacing">
                                                        <?php echo $value['office_mobil'];?>
                                                    </p>
                                                <?php if(!empty($value['office_mobil_2'])){ ?>
                                                    <p class="content-icon-spacing">
                                                        <?php echo $value['office_mobil_2'];?>
                                                    </p>
                                                <?php } ?>
                                                <?php } ?>

                                                <?php if(!empty($value['office_email'])){ ?>
                                                    <h3 class="email">E-mail</h3>
                                                    <p class="content-icon-spacing">
                                                        <?php echo Util::safe_mailto($value['office_email']);?>
                                                    </p>
                                                <?php if(!empty($value['office_email_2'])){ ?>
                                                    <p class="content-icon-spacing">
                                                        <?php echo Util::safe_mailto($value['office_email_2']);?>
                                                    </p>
                                                <?php } ?>
                                                <?php } ?>

                                                <?php if(!empty($value['office_opening'])){ ?>
                                                    <h3 class="address">Nyitvatartás</h3>
                                                    <p class="content-icon-spacing">
                                                        <?php echo $value['office_opening'];?>
                                                    </p>                    
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++; } ?>
                                </div>

                            </div><!-- .offices end -->                              

                        </div><!-- /.content -->
                    </div><!-- /.properties -->
                </div><!-- sidebar end -->
            </div> <!-- row end -->


        </div><!-- #main -->
    </div><!-- .container end -->
</div><!-- #content end -->

	
<!--</div> /#content -->
	
	
</div><!-- /#wrapper-inner -->
