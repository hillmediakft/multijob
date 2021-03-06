var send_email_company = function () {

    var send_mail_trigger = function (){

        $("#company_message_form").on('submit', function(e){
            
            e.preventDefault();
            
            var $data = $("#company_message_form").serialize();
           
            $.ajax({
                    url: "ajax_request/ajax_send_email",
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
                            document.getElementById("company_message_form").reset();
                            $("#message_company_email > div.alert-success").html(respond.message).show();
                            $("#message_company_email > div.alert-success").delay(3000).fadeOut(500);
                        } 
                        if(respond.status == 'error') {
                            $("#message_company_email > div.alert-danger").html(respond.message).show();
                            $("#message_company_email > div.alert-danger").delay(3000).fadeOut(500);
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
            
            send_mail_trigger();
			
        }
    };

}();

jQuery(document).ready(function() {    

    send_email_company.init();
	
});