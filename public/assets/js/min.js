function init() {
    var mapOptions = {
        zoom: 11,
        scrollwheel: false,
        center: new google.maps.LatLng(40.709896, -73.995481),
        styles: [{
            "featureType": "administrative.locality",
            "elementType": "all",
            "stylers": [{
                "hue": "#2c2e33"
            }, {
                "saturation": 7
            }, {
                "lightness": 19
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "hue": "#ffffff"
            }, {
                "saturation": -100
            }, {
                "lightness": 100
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "hue": "#ffffff"
            }, {
                "saturation": -100
            }, {
                "lightness": 100
            }, {
                "visibility": "off"
            }]
        }, {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "hue": "#bbc0c4"
            }, {
                "saturation": -93
            }, {
                "lightness": 31
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [{
                "hue": "#bbc0c4"
            }, {
                "saturation": -93
            }, {
                "lightness": 31
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [{
                "hue": "#bbc0c4"
            }, {
                "saturation": -93
            }, {
                "lightness": -2
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "hue": "#e9ebed"
            }, {
                "saturation": -90
            }, {
                "lightness": -8
            }, {
                "visibility": "simplified"
            }]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "hue": "#e9ebed"
            }, {
                "saturation": 10
            }, {
                "lightness": 69
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "hue": "#e9ebed"
            }, {
                "saturation": -78
            }, {
                "lightness": 67
            }, {
                "visibility": "simplified"
            }]
        }]
    };
    var mapElement = document.getElementById('footer-map');
    var map = new google.maps.Map(mapElement, mapOptions);
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(40.709896, -73.995481),
        map: map,
        icon: 'assets/img/icon-img/46.png',
        animation: google.maps.Animation.BOUNCE,
        title: 'Snazzy!'
    });
}
google.maps.event.addDomListener(window, 'load', init);