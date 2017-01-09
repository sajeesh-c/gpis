var isLocationUpdated = false;
google.maps.event.addDomListener(window, 'load', function () {
    var places = new google.maps.places.Autocomplete(document.getElementById('keywords_input'));
    google.maps.event.addListener(places, 'place_changed', function () {
        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();


        jQuery('#latitude').val(latitude);
        jQuery('#longitude').val(longitude);
        isLocationUpdated = true;
        jQuery('#search_form').submit();
    });
});


var codeAddress = function () {
    geocoder = new google.maps.Geocoder();
    var address = jQuery("#keywords_input").val();
    geocoder.geocode({'address': address}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            jQuery('#latitude').val(results[0].geometry.location.lat());
            jQuery('#longitude').val(results[0].geometry.location.lng());
            jQuery('#search_form').submit();
        }

        else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
};
