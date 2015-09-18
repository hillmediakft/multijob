var kapcsolat = function () {

    /*
     * Google térkép objektumok
     */
    var googleMapsInit = function (office_lat, office_lng) {
        
        //var myLatlng = new google.maps.LatLng(47.498983, 19.058315);
        var myLatlng = new google.maps.LatLng(office_lat, office_lng);
                
        var map_canvas = document.getElementById('map_canvas');

        var map_options = {
            scrollwheel: false,
            center: myLatlng,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            scaleControl: false,
            streetViewControl: true
        };

        var map = new google.maps.Map(map_canvas, map_options);

        var image = {
            url: 'public/site_assets/image/marker.png',
            size: new google.maps.Size(60, 62),
            origin: new google.maps.Point(0, 0)
        };

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: image
        });         
        
    };

    
    /*
     * A koordinátákat tároló objektum prototípusa (mint egy osztály)
     */
	var store_coordinates = function(latitude, longitude){
		
		this.latitude = latitude;
		this.longitude = longitude;
		
		this.set_latitude = function($data){
			this.latitude = $data;
		}
        this.set_longitude = function($data){
			this.longitude = $data;
		}
		
		this.get_latitude = function(){
			return this.latitude;
		}
        this.get_longitude = function(){
			return this.longitude;
		}

	};

    /*
     * A koordinátákat tároló objektum ebben a változóban fog tárolódni
     */
    var current_coordinates; 

    /*
     * Térkép adatok alapbeállítása
     */
    var set_default_coordinate = function() {
        
        var default_item = $('a[href="#collapse_1"]');
        
        var latitude = default_item.attr('data-latitude');
        var longitude = default_item.attr('data-longitude');
    
        // létrehozzuk az objektumot (az objekum a current_coordinates változóban tárolódnak)
        current_coordinates = new store_coordinates(latitude, longitude);
        current_coordinates.set_latitude(latitude);
        current_coordinates.set_longitude(longitude);

        googleMapsInit(latitude, longitude);
    };
    
    /*
     * Az oldal betöltődése után, új helyszín kiválasztásakor aktiválódik ez a metódus
     */
    var set_new_coordinate = function() {
        $('#accordion2').on('click', 'a[href*="#collapse_"]', function () {
            var this_item = $(this);
            var latitude = this_item.attr('data-latitude');
            var longitude = this_item.attr('data-longitude');    

            // csak akkor töltjük újra a térképet, ha nem ugyanazok az előző koordináták, mint amire klikkelt a user (menüelem összezárásakor ugyanaz lesz)
            if( (latitude != current_coordinates.get_latitude()) && longitude != current_coordinates.get_longitude() ){
                googleMapsInit(latitude, longitude);
                current_coordinates.set_latitude(latitude);
                current_coordinates.set_longitude(longitude);
            }            
        });
    };
        
    /*
     * Kapcsolat - email üzenet küldése (a "diák" email címre {a html-ben van a rejtett mező, ami utal a küldés címére})
     */
    var send_contact_email = function() {

        $("#contact_email_send_form").on('submit', function(e){
            
            e.preventDefault();
            
            var $data = $("#contact_email_send_form").serialize();
           
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
                            document.getElementById("contact_email_send_form").reset();
                            $("#msg_send_message > div.alert-success").html(respond.message).show();
                            $("#msg_send_message > div.alert-success").delay(3000).fadeOut(500);
                        } 
                        if(respond.status == 'error') {
                            $("#msg_send_message > div.alert-danger").html(respond.message).show();
                            $("#msg_send_message > div.alert-danger").delay(3000).fadeOut(500);
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
            set_default_coordinate();
            set_new_coordinate();
            send_contact_email();
        }
    };
}();




$(document).ready(function () {

    common_functions.init();
    modalHandler.init();
    send_email_footer.init();
    kapcsolat.init();


});