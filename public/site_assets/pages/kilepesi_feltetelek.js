var Kilepesi_feltetelek_page = function () {

	/**
	 *	Form validátor
	 */
    var handleValidation = function() {

		//console.log('validátor indul');

		var form1 = $('#kilepes_form');
		var error1 = $('#feedback_message');

		form1.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block', // default input error message class
			focusInvalid: true, // do not focus the last invalid input
			//ignore: "", // validate all fields including form hidden input
			rules: {
				name: {
					required: true,
				},
				mother_name: {
					required: true
				},
				birth_time: {
					required: true
				},
				tax_id: {
					required: true,
					number: true,
					minlength: 10
				},
				bank_account_number: {
					required: true,
				}
			},
			// az invalidHandler akkor aktiválódik, ha elküldjük a formot és hiba van
						

			invalidHandler: function (event, validator) { //display error alert on form submit              
				var errors = validator.numberOfInvalids();
				
				$error_number = errors + ' mezőt nem megfelelően töltöttél ki!';
				$error_message = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>' + $error_number + '</div>';
				error1.html($error_message);
				//error1.delay(4000).fadeOut('slow');

			},

			highlight: function (element) { // hightlight error inputs
				$(element).closest('.control-group').addClass('error'); // set error class to the control group                   
			},

			unhighlight: function (element) { // revert the change done by hightlight
				$(element).closest('.control-group').removeClass('error'); // set error class to the control group                   
			},

			success: function (label) {
				//label.closest('.form-group').removeClass('has-error').addClass("has-success"); // set success class to the control group
				label.closest('.control-group').removeClass('error'); // set success class to the control group
			},

			submitHandler: function (form) {
				//error1.hide();
				//console.log('form küldése!');	
				form.submit();
			}
		});
    };
    
    
    return {
        //main function to initiate the module
        init: function () {

			handleValidation();
            
        }
    };

	
}();


jQuery(document).ready(function() {    
	
	common_functions.init();
	modalHandler.init();
	sidebarSearch.init();
	Kilepesi_feltetelek_page.init();
	
});