$(document).ready(function() {

    var markersArray = [];
    var geocoder = new google.maps.Geocoder();
    if (latlng === undefined) {
        latlng = new google.maps.LatLng(14.876623, -91.591355);
        var zoom = 8;
    } else {
        var zoom = 13;
    }
    // Iniciar google Map y su configuracion.
    var options = {mapTypeId: google.maps.MapTypeId.ROADMAP};
    map = new google.maps.Map(document.getElementById("input_map"), options);

    // Colocar Marcado al hacer click
    google.maps.event.addListener(map, "click", function(event) {
        deleteOverlays();
        addMarker(event.latLng);
    });

    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK)
        {
            map.setCenter(results[0].geometry.location);
            map.setZoom(zoom);
            deleteOverlays();
            addMarker(results[0].geometry.location);
        }
    });

    var input = document.getElementById('input_buscar');
    var autocomplete = new google.maps.places.Autocomplete(input);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    google.maps.event.addDomListener(input, 'keydown', function(e) {

        if (e.keyCode == 13) {
            var address = document.getElementById("input_buscar").value;
            if (geocoder)
            {
                geocoder.geocode({'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        map.setCenter(results[0].geometry.location);
                        map.setZoom(13);
                        deleteOverlays();
                        addMarker(results[0].geometry.location);
                    }
                });
            }
            e.preventDefault();
        }
    });

    function addMarker(location)
    {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markersArray.push(marker);
        infowindow = new google.maps.InfoWindow();
        infowindow.setPosition(marker.getPosition());
        var latlng = marker.getPosition();
        $("#id_latitud").val(latlng.lat());
        $("#id_longitud").val(latlng.lng());

    }
    function deleteOverlays()
    {
        if (markersArray)
        {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
            markersArray.length = 0;
        }
    }
});	