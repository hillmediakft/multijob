var modalHandler = function () {

	var handle_login_modal = function(){
	//console.log('click: modal_login');
	/*
		$("#modal_login_trigger").on('click', function(){
			console.log('click: modal_login');
		});
	*/
		
		// amikor megjelenik a modal
		$('#modal_login').on('shown.bs.modal', function () {
			//$('#modal_login').focus()
			console.log('shown.bs.modal - login');
			
		});
		
		// amikor eltűnik a modal
		$('#modal_login').on('hidden.bs.modal', function () {
			// form adatok törlése
			document.getElementById("login_form").reset();
			// üzenetek törlése
			$("#message_login").html('');
		});		
	
		//amikor ráklikkelünk a bejelentkezés gombra
		$("#login_submit").on('click', function(){
			//console.log('click login_submit');
			var $data = $("#login_form").serialize();
			
			$.ajax({
				url: "users/ajax_login",
				data: $data,
				type: "POST",
				dataType: "json",
				beforeSend: function(){

				},
				complete: function(){
					//console.log('complete');
				},
				success: function(respond){
				
					console.log(respond);

					if(respond.status == 'logged_in'){
						//console.log('bejelentkezve');
						$('#modal_login').modal('hide');
						
						//átirányítás kezelése (alapesetben újratöltjük az oldalt, de ha a regisztráció ellenőrző oldalról irányítunk át akkor a home oldalra kell irányítani)
						var str = window.location.pathname;
						var url_part = str.search(/regisztracio\/\d/); //megnézzük, hogy szerepel-e regisztracio/szam az url-ben
						//ha nincs regisztracio/szam az url-ben
						if(url_part == -1){
							window.location.reload();
						} else {
							$host = window.location.hostname;
							window.location.assign('http://' + $host);
						}
						
					}
					else if (respond.status == 'error'){
						//console.log(respond.message);
						
						$error_messages = '';
						$.each( respond.message, function( index, value ){
							$error_messages += value + "<br />"; 
						});
						$error_messages += '<br />';
					
						$("#message_login").html($error_messages);						

					}

				},
				error: function(result, status, e){
					alert(e);
				} 

			});	
			
		});

	};
	

	var handle_register_modal = function(){
	
	/*
		$("#modal_register_trigger").on('click', function(){
			console.log('click: modal_register');
		});
	*/

		// amikor megjelenik a modal
		$('#modal_register').on('shown.bs.modal', function () {
			//$('#modal_register').focus()
			console.log('shown.bs.modal - register');
			
		});

		// amikor eltűnik a modal
		$('#modal_register').on('hidden.bs.modal', function () {
			//$('#modal_register').focus()
			// form adatok törlése
			document.getElementById("register_form").reset();
			//checkbox "ürítése"
			$("#user_newsletter").closest("div").removeClass("ez-checked");
			// üzenetek törlése
			$("#message_register").html('');
			// form láthatóságának visszaállítása
			$("#register_submit").show();
			$("#register_form").show();
			
		});
	
		// ha ráklikkelünk a küldésre
		$("#register_submit").on('click', function(){
			console.log('click: register_submit');
			
			var $data = $("#register_form").serialize();
				
			$.ajax({
				url: "regisztracio/ajax_register",
				data: $data,
				type: "POST",
				dataType: "json",
				beforeSend: function(){
					$.blockUI({
						boxed: true,
						message: '<h3>Feldolgozás...</h3>',
						baseZ: 5000
					});
				},
				complete: function(){
					$.unblockUI();
				},
				success: function(respond){
				
					console.log(respond);
				
					if(respond.status == 'success'){
						console.log('success');
						
						$success_messages = '';
						$.each( respond.message, function( index, value ){
							//console.log(index + ' : ' + value);
							$success_messages += value + "<br />"; 
						});
						//$success_messages += '<br />';
						
						$("#register_submit").hide();
						$("#register_form").hide();
						$("#message_register").html($success_messages);
						
					} 
					if(respond.status == 'error') {
					
						$error_messages = '';
						$.each( respond.message, function( index, value ){
							//console.log(index + ' : ' + value);
							$error_messages += value + "<br />"; 
						});
						$error_messages += '<br />';
					
						$("#message_register").html($error_messages);
		
					}
				
				},
				error: function(result, status, e){
					alert(e);
				} 
			
			
			});			
			
			
		});
		
	
	};

	var handle_subscribe_modal = function(){
	/*
		$("#modal_subscribe_trigger").on('click', function(){
			console.log('click: modal_subscribe');
		});
	*/

		// amikor megjelenik a modal
		$('#modal_subscribe').on('shown.bs.modal', function () {
			//$('#myInput').focus()
			//console.log('shown.bs.modal - subscribe');
		});
		
		// amikor eltűnik a modal
		$('#modal_subscribe').on('hidden.bs.modal', function () {
			//$('#modal_subscribe').focus()
			// form adatok törlése
			document.getElementById("subscribe_form").reset();
			// üzenetek törlése
			$("#message_subscribe").html('');
			// form, submit gomb, info láthatóságának visszaállítása
			$("#subscribe_submit").show();
			$("#subscribe_form").show();
			$("#info_subscribe").show();
		});		
	
		$("#subscribe_submit").on('click', function(){
			//console.log('click: subscribe_submit');
			
			var $data = $("#subscribe_form").serialize();
				
			$.ajax({
				url: "feliratkozas/ajax_subscribe",
				data: $data,
				type: "POST",
				dataType: "json",
				beforeSend: function(){
					$.blockUI({
						boxed: true,
						message: '<h3>Feldolgozás...</h3>',
						baseZ: 5000
					});
				},
				complete: function(){
					$.unblockUI();
				},
				success: function(respond){
					
					if(respond.status == 'success'){
						console.log('success');
						
						$success_messages = '';
						$.each( respond.message, function( index, value ){
							//console.log(index + ' : ' + value);
							$success_messages += value + "<br />"; 
						});
						//$success_messages += '<br />';
						
						$("#subscribe_submit").hide();
						$("#subscribe_form").hide();
						$("#info_subscribe").hide();
						$("#message_subscribe").html($success_messages);
						
					} 
					if(respond.status == 'error') {
					
						$error_messages = '';
						$.each( respond.message, function( index, value ){
							//console.log(index + ' : ' + value);
							$error_messages += value + "<br />"; 
						});
						$error_messages += '<br />';
					
						$("#message_subscribe").html($error_messages);
		
					}				

				
				
				},
				error: function(result, status, e){
					alert(e);
				} 
			
			
			});
		
		
		
		/*
		
			$("#subscribe_form").submit(function(event){
				event.preventDefault();
				
				var $data = $(this).serialize();
				
				$.ajax({
					url: "felhasznalok/feliratkozas",
					data: $data,
					type: "POST",
					dataType: "json",
					beforeSend: function(){

					},
					complete: function(){
						console.log('complete');

					},
					success: function(result){
					
						console.log(result);
					
						if(result.status == 'success'){
							console.log('success');

						} else {
			
						}
					
					},
					error: function(result, status, e){
						alert(e);
					} 
				
				
				});
			});
			
		*/	
			
			
			
		});

	
	};
	
	return {
 
		//main method to initiate page
		init: function () {           
		
			handle_login_modal();
			handle_register_modal();
			handle_subscribe_modal();
		}
 
	};
}();   