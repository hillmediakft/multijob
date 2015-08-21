<div style="display:none;" class="modal fade" id="modal_subscribe" tabindex="-1" role="dialog" aria-labelledby="modal_subscribe_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="modal_subscribe_label">Feliratkozás</h4>
		</div>
		
		
		<div class="modal-body">
			
			<div id="info_subscribe">Adja meg az e-mail címét, amelyre a hírlevelet kapni szeretné.<br />Ezután küldünk önnek egy levelet, aminek segítségével megerősítheti feliratkozási szándékát.<br /><br /></div>
			<div id="message_subscribe"></div>

			<form action="" method="post" name="subscribe_form" id="subscribe_form">
			<!-- 
				<div class="form-group">
					<label for="user_name" class="control-label">Név</label>
					<input type="text" placeholder="Név" name="user_name">
				</div>
			-->
				<div class="control-group">
					<label for="user_email" class="control-label">E-mail cím</label>
					<input type="text" placeholder="E-mail" name="user_email">
				</div>
		
				<!-- Ezt majd css-ben kell eltüntetni!! -->
				<!-- <input type="text"  name="security_name" value="security_name" /> -->
			</form>	  
	  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary" id="subscribe_submit">Feliratkozok</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
		</div>
		
    </div>
  </div>
</div>