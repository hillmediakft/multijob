var common_functions = function () {

    var hideAlert = function () {
		$('div.alert').delay(3000).fadeOut(500);						 		
	}

    return {
        //main function to initiate the module
        init: function () {

           hideAlert();
			
        }
    };

	
}();