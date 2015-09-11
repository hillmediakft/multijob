var kapcsolat = function () {

    var googleMapsInit = function () {

        var myLatlng = new google.maps.LatLng(47.498983, 19.058315);
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
        }
        var map = new google.maps.Map(map_canvas, map_options);
        map.set('styles', [
            {
                stylers: [
                    {saturation: -100}
                ]
            }, {
                featureType: 'poi.business',
                elementType: 'labels',
                stylers: [
                    {visibility: 'off'}
                ]
            }
        ]);

        var image = {
            url: 'public/site_assets/image/marker.png',
            size: new google.maps.Size(60, 62),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(91, 145)
        };
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: image
        });
    }

    var officeMap = function (office_lat, office_lng) {
console.log('meghívva');
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
        }
        var map = new google.maps.Map(map_canvas, map_options);
        map.set('styles', [
            {
                stylers: [
                    {saturation: -100}
                ]
            }, {
                featureType: 'poi.business',
                elementType: 'labels',
                stylers: [
                    {visibility: 'off'}
                ]
            }
        ]);

        var image = {
            url: 'public/site_assets/image/marker.png',
            size: new google.maps.Size(60, 62),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(91, 145)
        };
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: image
        });
    }
    
    var officeClick = function () { 
        
        $('a[href="#collapseTwo"]').on('click', function () {
            console.log("kattintva");
           officeMap(47.949289, 21.682472);  
            
        });
    }   

    return {
        //main function to initiate the module
        init: function () {

            googleMapsInit();
            officeClick();

        }
    };
}();




$(document).ready(function () {

    common_functions.init();
    modalHandler.init();
    send_email_footer.init();
    kapcsolat.init();


});