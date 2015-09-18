var Munka_page = function () {

    var jelentkezes_trigger = function() {
        
        $('#jelentkezes_button').on('click', function() {
            $('#jelentkezes_button').hide();
            $('#jelentkezes_box').slideDown();
        });
        
    };
    
    /*
     * Jelentkezés - email üzenet küldése (a "diák" email címre {a html-ben van a rejtett mező, ami utal a küldés címére})
     */
    var jelentkezes_email = function() {

        $("#jelentkezes_form").on('submit', function(e){
            
            e.preventDefault();
            
            var $data = $("#jelentkezes_form").serialize();
           
            $.ajax({
                    url: "ajax_request/ajax_send_email_jelentkezes",
                    data: $data,
                    type: "POST",
                    dataType: "json",
                    beforeSend: function(){
                        $.blockUI({
                            boxed: true,
                            message: '<h3>Üzenet küldése...</h3>',
                            baseZ: 5000
                        });
                    },
                    complete: function(){
                        $.unblockUI();
                    },
                    success: function(respond){

                        if(respond.status == 'success'){
                            document.getElementById("jelentkezes_form").reset();
                            $("#jelentkezes_feedback > div.alert-success").html(respond.message).show();
                            $("#jelentkezes_feedback > div.alert-success").delay(3000).fadeOut(500);
                            $('#jelentkezes_box').slideUp();
                        } 
                        if(respond.status == 'error') {
                            $("#jelentkezes_feedback > div.alert-danger").html(respond.message).show();
                            $("#jelentkezes_feedback > div.alert-danger").delay(3000).fadeOut(500);
                        }

                    },
                    error: function(result, status, e){
                        alert(e);
                    } 
                });	
                

        });  

    };      
    

    return {
        //main function to initiate the module
        init: function () {
            jelentkezes_trigger();
            jelentkezes_email();
			
        }
    };

	
}();


jQuery(document).ready(function() {    

    common_functions.init();	
	modalHandler.init();
	sidebarSearch.init();
	Munka_page.init();
	
});