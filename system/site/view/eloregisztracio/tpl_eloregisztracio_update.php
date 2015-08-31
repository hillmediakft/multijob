<!-- CONTENT -->
<div id="content">
    <div class="container">
        <div id="main">

			<div class="list-your-property-form">
				<h2 class="page-header">Regisztrációs adatok módosítása</h2>
			
				<div class="content">
				
					<div class="row">
						<div class="span8">
							<p>
								Etiam ullamcorper libero sed ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa.
							</p>
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
										<input type="text" name="name" value="<?php echo $prereg_data['name']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="mother_name" class="control-label">Anyja leánykori neve <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="mother_name" value="<?php echo $prereg_data['mother_name']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="birth_place" class="control-label">Születési hely <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="birth_place" value="<?php echo $prereg_data['birth_place']; ?>"/>
									</div>
								</div>
							
								<div class="control-group">
									<label for="birth_time" class="control-label">Születési idő <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="birth_time" value="<?php echo $prereg_data['birth_time']; ?>"/>
									</div>
								</div>
								
								<div class="control-group">
									<label for="nationality" class="control-label">Állampolgárság <span class="form-required">*</span></label>
									<div class="controls">	
										<input type="text" name="nationality" value="<?php echo $prereg_data['nationality']; ?>"/>
									</div>
								</div>
							</div> <!-- személyes adatok end -->
							
							<div class="span4">
								<h3><strong>2.</strong> <span>Egyéb adatok</span></h3>

								<div class="control-group" title="Ha van vonalkód az alatta lévő szám, -újon a kártyaszám, -ideiglenesen az igazolás sorszáma">
									<label for="student_card_number" class="control-label">Diákigazolvány száma <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="student_card_number" value="<?php echo $prereg_data['student_card_number']; ?>"/>
									</div>
									
								</div>
							
								<div class="control-group">
									<label for="taj_number" class="control-label">TAJ szám <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="taj_number" value="<?php echo $prereg_data['taj_number']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="tax_id" class="control-label">Adóazonosító jel <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="tax_id" value="<?php echo $prereg_data['tax_id']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="bank_account_number" class="control-label">Bankszámla száma <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="bank_account_number" value="<?php echo $prereg_data['bank_account_number']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="bank_name" class="control-label">Számlavezető bank neve <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="bank_name" value="<?php echo $prereg_data['bank_name']; ?>"/>
									</div>
								</div>
							</div>
							
							<div class="span4">
								<h3><strong>3.</strong> <span>Cím adatok</span></h3>
							
								<div class="control-group">
									<label for="permanent_address" class="control-label">Állandó lakcím <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="permanent_address" value="<?php echo $prereg_data['permanent_address']; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label for="contact_address" class="control-label">Elérhetőségi cím </label>
									<div class="controls">
										<input type="text" name="contact_address" value="<?php echo $prereg_data['contact_address']; ?>"/>
									</div>
								</div>
								
								<div class="control-group">
									<label for="email_address" class="control-label">E-mail cím <span class="form-required">*</span></label>
									<div class="controls">
										<input type="text" name="email_address" value="<?php echo $prereg_data['email_address']; ?>"/>
									</div>
								</div>
							
							
								<div style="height:4px"></div>
								<h3><strong>4.</strong> <span>Iskolai végzettség</span></h3>
															
								<div class="control-group">
									<label for="school_type" class="control-label">Legmagasabb iskolai végzettség <span class="form-required">*</span></label>
									<div class="controls">
										<select id="school_type" name="school_type" class="chosen-select" >
											<option id="altalanos" value="1" <?php echo ($prereg_data['school_type'] == 1) ? 'selected' : ''; ?>>Általános iskola</option>
											<option id="kozepiskola" value="2" <?php echo ($prereg_data['school_type'] == 2) ? 'selected' : ''; ?>>Középiskola</option>
											<option id="foiskola" value="3" <?php echo ($prereg_data['school_type'] == 3) ? 'selected' : ''; ?>>Főiskola / egyetem</option>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label for="school_data" class="control-label">Jelenlegi oktatási intézmény neve, címe <span class="form-required">*</span></label>
									<div class="controls">
										<!-- <input type="text" name="school_data" /> -->
										<textarea name="school_data" style="height:60px;"><?php echo $prereg_data['school_data']; ?></textarea>
									</div>
								</div>
								
							</div>
						
							<div class="span12">
								<button type="submit" name="pre_register_update" value="submitted" class="btn btn-primary" id="pre_register_update">Adatok módosítása</button>
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
