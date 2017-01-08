    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('keywords_input'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            jQuery('#latitude').val(latitude);
            jQuery('#longitude').val(longitude);
            jQuery('#search_form').submit();
        });
    });