var map;
var infowindow;
function doGeolocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(positionSuccess, positionError);
    } else {
        positionError(-1);
    }
}

function positionError(err) {
    var msg;
    switch(err.code) {
        case err.UNKNOWN_ERROR:
            msg = "Unable to find your location";
            break;
        case err.PERMISSION_DENINED:
            msg = "Permission denied in finding your location";
            break;
        case err.POSITION_UNAVAILABLE:
            msg = "Your location is currently unknown";
            break;
        case err.BREAK:
            msg = "Attempt to find location took too long";
            break;
        default:
            msg = "Location detection not supported in browser";
    }
    document.getElementById('info').innerHTML = msg;
}

function positionSuccess(position) {
    // Centre the map on the new location
    var coords = position.coords || position.coordinate || position;
    var latLng = new google.maps.LatLng(coords.latitude, coords.longitude);
    map.setCenter(latLng);
    map.setZoom(12);
    var marker = new google.maps.Marker({
        map: map,
        position: latLng,
        title: 'Why, there you are!'
    });
    document.getElementById('info').innerHTML = 'Looking for <b>' +
        coords.latitude + ', ' + coords.longitude + '</b>...';

    // And reverse geocode.
    (new google.maps.Geocoder()).geocode({latLng: latLng}, function(resp) {
        var place = "You're around here somewhere!";
        if (resp[0]) {
            var bits = [];
            for (var i = 0, I = resp[0].address_components.length; i < I; ++i) {
                var component = resp[0].address_components[i];
                if (contains(component.types, 'political')) {
                    bits.push('<b>' + component.long_name + '</b>');
                }
            }
            if (bits.length) {
                place = bits.join(' > ');
            }
            marker.setTitle(resp[0].formatted_address);
        }
        document.getElementById('info').innerHTML = place;
    });
}

function contains(array, item) {
    for (var i = 0, I = array.length; i < I; ++i) {
        if (array[i] == item) return true;
    }
    return false;
}

function createContextMenu(map) {
    var directionsRendererOptions={};
    directionsRendererOptions.draggable=false;
    directionsRendererOptions.hideRouteList=true;
    directionsRendererOptions.suppressMarkers=false;
    directionsRendererOptions.preserveViewport=false;
    var directionsRenderer=new google.maps.DirectionsRenderer(directionsRendererOptions);
    var directionsService=new google.maps.DirectionsService();

    var contextMenuOptions={};
    contextMenuOptions.classNames={menu:'context_menu', menuSeparator:'context_menu_separator'};

    //	create an array of ContextMenuItem objects
    //	an 'id' is defined for each of the four directions related items
    var menuItems=[];
    menuItems.push({className:'context_menu_item', eventName:'directions_origin_click', id:'directionsOriginItem', label:'Directions from here'});
    menuItems.push({className:'context_menu_item', eventName:'directions_destination_click', id:'directionsDestinationItem', label:'Directions to here'});
    menuItems.push({className:'context_menu_item', eventName:'clear_directions_click', id:'clearDirectionsItem', label:'Clear directions'});
    menuItems.push({className:'context_menu_item', eventName:'get_directions_click', id:'getDirectionsItem', label:'Get directions'});
    //	a menuItem with no properties will be rendered as a separator
    menuItems.push({});
    menuItems.push({className:'context_menu_item', eventName:'zoom_in_click', label:'Zoom in'});
    menuItems.push({className:'context_menu_item', eventName:'zoom_out_click', label:'Zoom out'});
    menuItems.push({});
    menuItems.push({className:'context_menu_item', eventName:'center_map_click', label:'Center map here'});
    contextMenuOptions.menuItems=menuItems;

    var contextMenu=new ContextMenu(map, contextMenuOptions);

    google.maps.event.addListener(map, 'rightclick', function(mouseEvent){
        contextMenu.show(mouseEvent.latLng);
    });

    //	create markers to show directions origin and destination
    //	both are not visible by default
    var markerOptions={};
    markerOptions.icon='http://www.google.com/intl/en_ALL/mapfiles/markerA.png';
    markerOptions.map=null;
    markerOptions.position=new google.maps.LatLng(0, 0);
    markerOptions.title='Directions origin';

    var originMarker=new google.maps.Marker(markerOptions);

    markerOptions.icon='http://www.google.com/intl/en_ALL/mapfiles/markerB.png';
    markerOptions.title='Directions destination';
    var destinationMarker=new google.maps.Marker(markerOptions);

    //	listen for the ContextMenu 'menu_item_selected' event
    google.maps.event.addListener(contextMenu, 'menu_item_selected', function(latLng, eventName){
        switch(eventName){
            case 'directions_origin_click':
                originMarker.setPosition(latLng);
                if(!originMarker.getMap()){
                    originMarker.setMap(map);
                }
                break;
            case 'directions_destination_click':
                destinationMarker.setPosition(latLng);
                if(!destinationMarker.getMap()){
                    destinationMarker.setMap(map);
                }
                break;
            case 'clear_directions_click':
                directionsRenderer.setMap(null);
                //	set CSS styles to defaults
                document.getElementById('clearDirectionsItem').style.display='';
                document.getElementById('directionsDestinationItem').style.display='';
                document.getElementById('directionsOriginItem').style.display='';
                document.getElementById('getDirectionsItem').style.display='';
                break;
            case 'get_directions_click':
                var directionsRequest={};
                directionsRequest.destination=destinationMarker.getPosition();
                directionsRequest.origin=originMarker.getPosition();
                directionsRequest.travelMode=google.maps.TravelMode.DRIVING;

                directionsService.route(directionsRequest, function(result, status){
                    if(status===google.maps.DirectionsStatus.OK){
                        //	hide the origin and destination markers as the DirectionsRenderer will render Markers itself
                        originMarker.setMap(null);
                        destinationMarker.setMap(null);
                        directionsRenderer.setDirections(result);
                        directionsRenderer.setMap(map);
                        //	hide all but the 'Clear directions' menu item
                        document.getElementById('clearDirectionsItem').style.display='block';
                        document.getElementById('directionsDestinationItem').style.display='none';
                        document.getElementById('directionsOriginItem').style.display='none';
                        document.getElementById('getDirectionsItem').style.display='none';
                    } else {
                        alert('Sorry, the map was unable to obtain directions.\n\nThe request failed with the message: '+status);
                    }
                });
                break;
            case 'zoom_in_click':
                map.setZoom(map.getZoom()+1);
                break;
            case 'zoom_out_click':
                map.setZoom(map.getZoom()-1);
                break;
            case 'center_map_click':
                map.panTo(latLng);
                break;
        }
        if(originMarker.getMap() && destinationMarker.getMap() && document.getElementById('getDirectionsItem').style.display===''){
            //	display the 'Get directions' menu item if it is not visible and both directions origin and destination have been selected
            document.getElementById('getDirectionsItem').style.display='block';
        }
    });
};
function getSearchTypes() {
    var type=(typeof searchType === 'undefined')?'ALL':searchType;

    if(type=='ALL'){
        return ['hospital','bank','book_store','dentist','fire_station','gym','jewelry_store','library','local_government_office','lodging','movie_theater','park','parking','pharmacy','post_office','shopping_mall','stadium','taxi_stand','train_station','university','restaurant','school','hindu_temple','airport','railway','police','church'];
    }else{
        type = type.toLowerCase();
        return [type];
    }
}
function initialize( Latitude, Longitude ) {
    var center = new google.maps.LatLng(Latitude,Longitude);
    map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 14,
        styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{color: '#263c3f'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#6b9a76'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#38414e'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{color: '#212a37'}]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{color: '#9ca5b3'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#746855'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#1f2835'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{color: '#f3d19c'}]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{color: '#2f3948'}]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{color: '#17263c'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#515c6d'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#17263c'}]
            }
        ]
    });

    var request = {
        location: center,
        radius: 2047,
        types: getSearchTypes()
    };
    createContextMenu(map);
    // console.log(event.latLng);
    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {

    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker(
        {
            map: map,
            position: place.geometry.location,
            animation: google.maps.Animation.BOUNCE
        });


    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(place.name);
        infowindow.open(map, this);

    });

}
