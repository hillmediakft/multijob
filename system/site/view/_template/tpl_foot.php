<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                
				<div class="widget properties span3">
                    <div class="title">
                        <h2>Legfrissebbek</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        
						<?php
						$i = 0;
						foreach($latest_jobs as $value) { ?>
						<div class="property">
                            <div class="image">
                                <a href="#"></a>
                                <img src="<?php echo Config::get('jobphoto.upload_path') . $value['job_list_photo'];?>" alt="">
                            </div><!-- /.image -->
                            <div class="wrapper">
                                <div class="title">
                                    <h3>
                                        <a href="#"><?php echo $value['job_title']; ?></a>
                                    </h3>
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
                                
                            </div><!-- /.wrapper -->
                        </div><!-- /.property -->
						<?php 
							$i++;
							if($i >= 3){
								break;
							}
						} 
						?>
                    
					</div><!-- /.content -->
                </div><!-- /.properties-small -->
				
				
				
				

                <div class="widget span3">
                    <div class="title">
                        <h2>Kapcsolat</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                                <tr>
                                    <th class="address">Cím:</th>
  									<td><?php echo $settings['cim'];?><br></td>
                                </tr>
                                <tr>
                                    <th class="phone">Telefon:</th>
                                    <td><?php echo $settings['tel'];?></td>
                                </tr>
                                <tr>
                                    <th class="email">E-mail:</th>
                                    <td><a href="mailto:<?php echo $settings['email'];?>"><?php echo $settings['email'];?></a></td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Linkek</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="#">Hogyan dolgozunk</a></li>
                            <li class="leaf"><a href="#">Jelentkezési feltételek</a></li>
                            <li class="leaf"><a href="#">Regsiztráció</a></li>
                            <li class="leaf"><a href="#">Gyakori kérdések</a></li>
                            <li class="leaf"><a href="#">Cégeknek</a></li>
                            <li class="leaf"><a href="x">Irodáink</a></li>
                            <li class="last leaf"><a href="#">Egyéb infó</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Írj nekünk!</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <form method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputName">
                                    Név
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">
                                    E-mail
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputMessage">
                                    Üzenet
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Küldés">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>© Copyright 2015 | Multijob Iskolaszövetkezet</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="http://www.facebook.com" class="facebook">Facebook</a></li>
                            <li class="leaf"><a href="http://flickr.net" class="flickr">Flickr</a></li>
                            <li class="leaf"><a href="http://plus.google.com" class="google">Google+</a></li>
                            <li class="leaf"><a href="http://www.linkedin.com" class="linkedin">LinkedIn</a></li>
                            <li class="leaf"><a href="http://www.twitter.com" class="twitter">Twitter</a></li>
                            <li class="last leaf"><a href="http://www.vimeo.com" class="vimeo">Vimeo</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>jquery.ezmark.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>jquery.currency.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>retina.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>carousel.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>gmap3.infobox.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS; ?>plugins/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS; ?>plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS; ?>plugins/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS; ?>realia.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php
if (isset($this->js_link)) {
    foreach ($this->js_link as $value) {
        echo $value;
    }
}
?>

</body>
</html>