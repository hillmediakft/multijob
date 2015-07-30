var send_email_footer = function () {

    var send_mail_trigger = function (){

        $("#footer_message_form").on('submit', function(e){

            e.preventDefault();
            
            var $data = $("#footer_message_form").serialize();
           
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

                        console.log(respond);

                        if(respond.status == 'success'){
                            console.log(respond.message);

                        } 
                        if(respond.status == 'error') {

                            console.log(respond.message);
      
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