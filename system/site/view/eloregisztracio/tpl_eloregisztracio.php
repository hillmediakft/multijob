<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">

			<div class="list-your-property-form">
				<h2 class="page-header">Regisztrációs adatlap</h2>
			
				<div class="content">
				
					<div class="row">
						<div class="span8">
							<?php echo $content['page_body']; ?>
						</div><!-- /.span8 -->
					</div><!-- /.row -->				
					
					<!-- ÜZENETEK -->	
					<div class="row">
						<div class="span12">
							<div id="validator_error">
								<?php $this->renderFeedbackMessages(); ?>
							</div>
						</div>
					</div>

					<form action="" method="POST" id="pre_register_form" name="pre_register_form">	
						<div class="row">
						
							<div class="span4">
								<h3><strong>1.</strong> <span>Személyes adatok</span></h3>
						
								<div class="control-group">
									<label for="name" class="control-label">Név <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="name" />
									</div>
								</div>

								<div class="control-group">
									<label for="mother_name" class="control-label">Anyja leánykori neve <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="mother_name" />
									</div>
								</div>

								<div class="control-group">
									<label for="birth_place" class="control-label">Születési hely <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="birth_place" />
									</div>
								</div>
							
								<div class="control-group">
									<label for="birth_time" class="control-label">Születési idő <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="birth_time" />
									</div>
								</div>
								
								<div class="control-group">
									<label for="nationality" class="control-label">Állampolgárság <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="nationality" />
									</div>
								</div>
							</div> <!-- személyes adatok end -->
							
							<div class="span4">
								<h3><strong>2.</strong> <span>Egyéb adatok</span></h3>

								<div class="control-group" title="Ha van vonalkód az alatta lévő szám, -újon a kártyaszám, -ideiglenesen az igazolás sorszáma">
									<label for="student_card_number" class="control-label">Diákigazolvány száma <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="student_card_number" />
									</div>
									
								</div>
							
								<div class="control-group">
									<label for="taj_number" class="control-label">TAJ szám <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="taj_number" />
									</div>
								</div>

								<div class="control-group">
									<label for="tax_id" class="control-label">Adóazonosító jel <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="tax_id" />
									</div>
								</div>

								<div class="control-group">
									<label for="bank_account_number" class="control-label">Bankszámla száma <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="bank_account_number" />
									</div>
								</div>

								<div class="control-group">
									<label for="bank_name" class="control-label">Számlavezető bank neve <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="bank_name" />
									</div>
								</div>
							</div>
							
							<div class="span4">
								<h3><strong>3.</strong> <span>Cím adatok</span></h3>
							
								<div class="control-group">
									<label for="permanent_address" class="control-label">Állandó lakcím <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="permanent_address" />
									</div>
								</div>

								<div class="control-group">
									<label for="contact_address" class="control-label">Elérhetőségi cím</label>
									<div class="controls">
										<input type="text" name="contact_address" />
									</div>
								</div>
								
								<div class="control-group">
									<label for="email_address" class="control-label">E-mail cím <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="email_address" />
									</div>
								</div>
							
							
								<div style="height:4px"></div>
								<h3><strong>4.</strong> <span>Iskola adatok</span></h3>
															
								<div class="control-group">
									<label for="school_type" class="control-label">Legmagasabb iskolai végzettség <span class="form-required">*</span></label>
									<div class="controls">
										<select id="school_type" name="school_type" class="chosen-select" >
											<option id="altalanos" value="1">Általános iskola</option>
											<option id="kozepiskola" value="2">Középiskola</option>
											<option id="foiskola" value="3">Főiskola / egyetem</option>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label for="school_data" class="control-label">Jelenlegi oktatási intézmény neve, címe <span class="form-required">*</span></label>
									<div class="controls">
										<!-- <input type="text" name="school_data" /> -->
										<textarea name="school_data" style="height:60px;"></textarea>
									</div>
								</div>
								
							</div>
						
							<div class="span12">
								<button type="submit" name="pre_register_submit" value="submitted" class="btn btn-primary" id="pre_register_submit">Adatlap küldése</button>
							</div>
					

							<!-- Ezt majd css-ben kell eltüntetni!! -->
							<!-- <input type="hidden"  name="security_name" />-->
						</div>
					</form>	
				</div>
				
			</div>

				
				
				
				
				
				
				
                

    
        </div> <!-- main end-->
    </div> <!-- container end-->
</div><!-- /#content -->
	
</div><!-- /#wrapper-inner -->
