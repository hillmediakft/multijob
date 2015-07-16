var sidebarSearch = function () {

/*
	function InitChosen() {
		$('.chosen-select').chosen({
			disable_search_threshold: 10
		});
	}
*/
	var search_parts = {
		megye: '',
		kerulet: '',
		varos: '',
		kategoria: '' 
	};

	var field_status = {
		megye: false,
		kerulet: false,
		varos: false,
		kategoria: false 
	};

	var check_search_input = function(){

		// query string visszaadása a $search változóba	
		var $search = window.location.search;
		
		if($search != ''){
		
			var $query_string = window.location.search.substring(1);
			//console.log('QS:' + $query_string);
			
			// a query stringet felbonjuk & jel mentén
			var $qs_parts = $query_string.split('&');
			var $option;
			
			// berakjuk az értékeket a search_parts objektumba
			$.each( $qs_parts, function( index, value ){
				$option = value.split('=');
				
				if($option[0] == 'megye'){
					search_parts.megye = $option[1];
				}
				else if($option[0] == 'kerulet'){
					search_parts.kerulet = $option[1];
				}
				else if($option[0] == 'varos'){
					search_parts.varos = $option[1];
				}
				else if($option[0] == 'kategoria'){
					search_parts.kategoria = $option[1];
				}
			});

			//console.log(search_parts);
			
		}

	}

	
	var ajax_county_query = function(){
		$.ajax({
			type: "post",
			url: "ajax_request/ajax_county_list",
			//beforeSent: function() {},
			//complete: function() {},
			success: function(data) {
					//console.log(data);
					$("#county_select").html(data);
					// mező státszának beállítása (true : már van benne adat)
					field_status.megye = true;
					// aktív elem beállítása
					if(search_parts.megye != '') {
						$("#county_select").val(search_parts.megye);
					}
					//a chosen 1.0 feletti verzió (chosen:updated)
					// $("#county_select").trigger("chosen:updated");
					$("#county_select").trigger("liszt:updated");

			}
		});	
	}

	var ajax_district_query = function(){
		$.ajax({
			type: "post",
			url: "ajax_request/ajax_district_list",
			//beforeSent: function() {},
			//complete: function() {},
			success: function(data) {
					//console.log(data);
					$("#district_select").html(data);
					// mező státszának beállítása (true : már van benne adat)
					field_status.kerulet = true;
					// aktív elem beállítása
					if(search_parts.kerulet != '') {
						$("#district_select").val(search_parts.kerulet);					
					}
					$("#district_select").trigger("liszt:updated");
				}
		});	
	}

	var ajax_city_query = function($county_id){
		$.ajax({
			type: "post",
			url: "ajax_request/ajax_city_list",
			data: "county_id=" + $county_id,
			// beforeSent: function() {},
			// complete: function() {},
			success: function(data) {
					//console.log(data);
					$("#city_select").html(data);
					// mező státszának beállítása (true : már van benne adat)
					field_status.varos = true;
					// aktív elem beállítása
					if(search_parts.varos != '') {
						$("#city_select").val(search_parts.varos);					
					}					
					$("#city_select").trigger("liszt:updated");
			}
		});	
	}

	var ajax_category_query = function(){
		$.ajax({
			type: "post",
			url: "ajax_request/ajax_job_category_list",
			// beforeSent: function() {},
			// complete: function() {},
			success: function(data) {
					//console.log(data);
					$("#job_category_select").html(data);
					// mező státszának beállítása (true : már van benne adat)
					field_status.kategoria = true;
					// aktív elem beállítása
					if(search_parts.kategoria != '') {
						$("#job_category_select").val(search_parts.kategoria);					
					}					
					// $("#job_category_select").trigger("chosen:updated");
					$("#job_category_select").trigger("liszt:updated");
				}
		});	
	}
	
	
	

	var locationsInput = function(){

		//$county_select = $("#county_select");
		//$district_select = $("#district_select");
		//$city_select = $("#city_select");
		
		// beállítja a search_parts objektum értékeit a query string alapján
		check_search_input();
		
	// megvizsgáljuk, hogy vannak e keresési feltételek a query string-ben
	// ha van keresési feltétel betöltjök az option listát
		if(search_parts.megye != ''){
			ajax_county_query();
		}
		if(search_parts.kerulet != ''){
			ajax_district_query();
			$("#district_select").prop('disabled', false);
		}
		if(search_parts.varos != ''){
			ajax_city_query(search_parts.megye);
			$("#city_select").prop('disabled', false);
		}
		if(search_parts.kategoria != ''){
			ajax_category_query();
		}

	
		// behívja megyék listáját (ha az üres /csak az első klikkelésig lesz üres/)
		$("#county_div a.chzn-single").on('click', function(){
			// ha az option lista üres
			if(field_status.megye === false){
				ajax_county_query();
			}			
		});
		
		// ha változik a megye kiválasztott elem
		$("#county_select").chosen().change(function(e){
			//console.log(e);
			// megadja a megye id-jét
			// $county_id = e.target.value;
			$county_id = $("#county_select").val();
			console.log($county_id);
			
			// ha Budapest van kiválasztva
			if($county_id == 5){
				
				$("#city_select").prop('disabled', true);
				$("#city_select").html('');
				$("#city_select").trigger("liszt:updated");
				
				// ha üres az option lista akkor lekérdezzük a kerületeket
				if(field_status.kerulet === false){
					ajax_district_query();
				}
				
				// a kerület listáról levesszük a disabled-et és updateljük a chosen-t
				$("#district_select").prop('disabled', false);
				$("#district_select").trigger("liszt:updated");					
			
			} else {
				// ha nem Budapest van kiválasztva
				$("#district_select").prop('disabled', true);
				$("#district_select").val('');
				$("#district_select").trigger("liszt:updated");

				$("#city_select").prop('disabled', false);
				//$("#city_select").trigger("liszt:updated");
				ajax_city_query($county_id);
			}
			
		});	
		
		// munka kategóriák behívása
		$("#job_category_div a.chzn-single").on('click', function(){
			// ha az option lista üres
			if(field_status.kategoria === false){
				ajax_category_query();
			}			
		});	
		
		
		
		
		/*
		$("#sidebar_search_form").submit(function(e){
			e.preventDefault();
			console.log(e);
			
			$county = $("#county_select").val();
			$city = $("#city_select").val();
			$district = $("#district_select").val();
			$category = $("#job_category_select").val();
			
			console.log($county);
			console.log($city);
			console.log($district);
			console.log($category);
			
			
			
		});
		*/
	
	}

    return {
        //main function to initiate the module
        init: function () {
			
			locationsInput();
        }
    };
	
}();