<div class="title">
	<h2>Keresés</h2>
</div><!-- /.title --> 

<div class="property-filter pull-right">
	<div class="content">
	
		<form method="GET" action="munkak" name="sidebar_search_form" id="sidebar_search_form">
			
			<div id="county_div" class="location control-group">
				<label class="control-label" for="county_select">
					Megye
				</label>
				<div class="controls">
					<select data-placeholder="Válasszon..." name="megye" id="county_select" class="chosen-select">
					</select>
				</div><!-- /.controls -->
			</div><!-- /.control-group -->


			<div id="district_div" class="type control-group">
				<label class="control-label" for="inputType">
					Kerület
				</label>
				<div class="controls">
					<select disabled data-placeholder="Válasszon..." name="kerulet" id="district_select" class="chosen-select">
					</select>
				</div><!-- /.controls -->
			</div><!-- /.control-group -->

			<div id="city_div" class="type control-group">
				<label class="control-label" for="inputType">
					Város
				</label>
				<div class="controls">
					<select disabled data-placeholder="Válasszon..." name="varos" id="city_select" class="chosen-select">
					</select>
				</div><!-- /.controls -->
			</div><!-- /.control-group -->

			
			<div id="job_category_div" class="type control-group">
				<label class="control-label" for="inputType">
					Munka típusa
				</label>
				<div class="controls">
					<select data-placeholder="Válasszon..." name="kategoria" id="job_category_select" class="chosen-select">
					</select>
				</div><!-- /.controls -->
			</div><!-- /.control-group -->



			<div class="form-actions">
				<input type="submit" id="submit_search_sidebar" value="Keresés" class="btn btn-primary btn-large">
			</div><!-- /.form-actions -->
		</form>
	</div><!-- /.content -->
</div><!-- /.property-filter --> 