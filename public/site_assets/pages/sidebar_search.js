var sidebarSearch = function () {

/*
	function InitChosen() {
		$('.chosen-select').chosen({
			disable_search_threshold: 10
		});
	}
*/


	var locationsInput = function(){
		
		//$county_select = $("#county_select");
		//$district_select = $("#district_select");
		//$city_select = $("#city_select");
		
		if($("#county_select").attr('data-status') == 'false'){

			$("#city_select").prop('disabled', true);
			$("#district_select").prop('disabled', true);
			$("#city_select").trigger("liszt:updated");
			$("#district_select").trigger("liszt:updated");

		}	
	
		// behívja megyék listáját (ha az üres <csak az első klikkelésig lesz üres>)
		$("#county_div a.chzn-single").on('click', function(){
			// azt jelzi, hogy üres-e az option lista (false üres; true nem üres)
			var $status = $("#county_select").attr('data-status');
			
			// ha az option lista üres
			if($status == 'false'){
				$.ajax({
					type: "post",
					url: "ajax_request/ajax_county_list",
					beforeSent: function() {
							//$("#loading").show();
					},
					complete: function() {
							//$("#loading").hide();
					},
					success: function(data) {
							//console.log(data);
							$("#county_select").html(data);
							$("#county_select").attr('data-status', 'true');
							//a chosen 1.0 feletti verzió (chosen:updated)
							// $("#county_select").trigger("chosen:updated");
							$("#county_select").trigger("liszt:updated");
					}
				});
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
				
				// azt jelzi, hogy üres-e az option lista (false üres; true nem üres)
				var $status = $("#district_select").attr('data-status');
				
				// ha üres az option lista akkor lekérdezzük a kerületeket
				if($status == 'false'){
				
					$.ajax({
						type: "post",
						url: "ajax_request/ajax_district_list",
						//data: ,
						beforeSent: function() {
								//$("#loading").show();
							},
						complete: function() {
								//$("#loading").hide();
							},
						success: function(data) {
								//console.log(data);
								$("#district_select").html(data);
								$("#district_select").attr('data-status', 'true');
								$("#district_select").trigger("liszt:updated");
							}
					});

				}
				
				// a kerület listáról levesszük a disabled-et és updateljük a chosen-t
				$("#district_select").prop('disabled', false);
				$("#district_select").trigger("liszt:updated");					
			
			} else {
				// ha nem Budapest van kiválasztva
			
				$("#city_select").prop('disabled', false);
				$("#city_select").trigger("liszt:updated");
				$("#district_select").prop('disabled', true);
				$("#district_select").val('');
				$("#district_select").trigger("liszt:updated");

				$.ajax({
					type: "post",
					url: "ajax_request/ajax_city_list",
					data: "county_id=" + $county_id,
					beforeSent: function() {
							//$("#loading").show();
					},
					complete: function() {
							//$("#loading").hide();
					},
					success: function(data) {
							//console.log(data);
							$("#city_select").html(data);
							$("#city_select").trigger("liszt:updated");
					}
				});
			}
			
		});	
		
		// munka kategóriák behívása
		$("#job_category_div a.chzn-single").on('click', function(){

			var $status = $("#job_category_select").attr('data-status');
			// ha az option lista üres
			if($status == 'false'){
				
				$.ajax({
					type: "post",
					url: "ajax_request/ajax_job_category_list",
					beforeSent: function() {
							//$("#loading").show();
						},
					complete: function() {
							//$("#loading").hide();
						},
					success: function(data) {
							//console.log(data);
							$("#job_category_select").html(data);
							$("#job_category_select").attr('data-status', 'true');
							// $("#job_category_select").trigger("chosen:updated");
							$("#job_category_select").trigger("liszt:updated");
						}
				});
	
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