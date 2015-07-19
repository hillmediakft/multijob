<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">
            


            <div class="row">
                <div class="span9">

					<h1 class="page-header">Előregisztráció</h1>
					
					<div class="list-your-property-form">
						<form action="" method="POST" id="pre_register_form" name="pre_register_form">	

							<div class="control-group">
								<label for="name" class="control-label">Név <span class="form-required">*</span></label>
								<input type="text" name="name" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="mother_name" class="control-label">Anyja neve (leánykori)</label>
								<input type="text" name="mother_name" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="birth_place" class="control-label">Születési hely</label>
								<input type="text" name="birth_place" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="birth_time" class="control-label">Születési idő</label>
								<input type="text" name="birth_time" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="student_card_number" class="control-label">Diákigazolvány száma</label>
								<input type="text" name="student_card_number" placeholder="" class="form-control input-xlarge" />
								<span class="help-block">Ha van vonalkód az alatta lévő szám, -újon a kártyaszám, -ideiglenesen az igazolás sorszáma</span>
							</div>

							<div class="control-group">
								<label for="taj_number" class="control-label">TAJ szám</label>
								<input type="text" name="taj_number" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="nationality" class="control-label">Állampolgárság</label>
								<input type="text" name="nationality" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="tax_id" class="control-label">Adóazonosító jele</label>
								<input type="text" name="tax_id" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="bank_account_number" class="control-label">Bankszámla száma</label>
								<input type="text" name="bank_account_number" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="bank_name" class="control-label">Számlavezető bank neve</label>
								<input type="text" name="bank_name" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="permanent_address" class="control-label">Állandó lakcím</label>
								<input type="text" name="permanent_address" placeholder="" class="form-control input-xlarge" />
							</div>

							<div class="control-group">
								<label for="contact_address" class="control-label">Elérhetőségi cím</label>
								<input type="text" name="contact_address" placeholder="" class="form-control input-xlarge" />
							</div>
							
							<div class="control-group">
								<label for="email_address" class="control-label">E-mail cím</label>
								<input type="text" placeholder="" name="email_address" class="form-control input-xlarge" />
							</div>


							<label class="control-label">Legmagasabb iskolai végzettség</label>
							<div class="control-group">
								<label>
									<input type="radio" name="school" id="school1" value="altalanos">
									Általános iskola
								</label>
								<label>
									<input type="radio" name="school" id="school2" value="kozepiskola">
									Középiskola
								</label>
								<label>
									<input type="radio" name="school" id="school3" value="foiskola">
									Főiskola / egyetem
								</label>
							</div>	
							
							<br />
							
							<button type="submit" class="btn btn-primary" id="pre_register_submit">Regisztrálok</button>

							<!-- Ezt majd css-ben kell eltüntetni!! -->
							<!-- <input type="hidden"  name="security_name" />-->
						
						</form>	
					</div>
                </div>
                <div class="sidebar span3">
                    
                    <!-- KERESŐ DOBOZ -->
					<?php include('system/site/view/_template/tpl_sidebar_search.php'); ?>               

                    
                    <div class="widget our-agents">
                        <div class="title">
                            <h2>Kollégáink</h2>
                        </div><!-- /.title -->

                        
                        <div class="content">
                            <div class="agent">
                                <div class="image">
                                    <img src="<?php echo SITE_IMAGE;?>photos/agent.png" alt="">
                                </div><!-- /.image -->
                                <div class="name">Gipsz jakab</div><!-- /.name -->
                                <div class="phone">333-666-777</div><!-- /.phone -->
                                <div class="email"><a href="mailto:jakab@example.com">jakab@example.com</a></div><!-- /.email -->
                            </div><!-- /.agent -->

                            <div class="agent">
                                <div class="image">
                                    <img src="<?php echo SITE_IMAGE;?>photos/agent.png" alt="">
                                </div><!-- /.image -->
                                <div class="name">Cserepes Virág</div><!-- /.name -->
                                <div class="phone">111-222-333</div><!-- /.phone -->
                                <div class="email"><a href="mailto:virag@example.com">virag@example.com</a></div><!-- /.email -->
                            </div><!-- /.agent -->
                        </div><!-- /.content -->
                    </div><!-- /.our-agents -->

                </div>
            </div>
    
        </div>
    </div>

    <div class="bottom-wrapper">
        <div class="bottom container">
            <div class="bottom-inner row">
                <div class="item span4">
                    <div class="address decoration"></div>
                    <h2><a>Regisztrálj az oldalunkon</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                    <a href="#" class="btn btn-primary">Regisztrálok</a>
                </div><!-- /.item -->

                <div class="item span4">
                    <div class="gps decoration"></div>
                    <h2><a>Figyeld a munkákat</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                    <a href="#" class="btn btn-primary">Munkák</a>
                </div><!-- /.item -->

                <div class="item span4">
                    <div class="key decoration"></div>
                    <h2><a>Jelentkezz munkára</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                    <a href="#" class="btn btn-primary">Jelentkezés</a>
                </div><!-- /.item -->
            </div><!-- /.bottom-inner -->
        </div><!-- /.bottom -->
    </div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
