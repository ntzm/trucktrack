module.exports = () => {
    let directionsService = new google.maps.DirectionsService();

    let map = new google.maps.Map(document.getElementsByClassName('map')[0], {
        center: {lat: -34.397, lng: 150.644},
        zoom: 3,
        disableDefaultUI: true,
        styles: require('./style'),
    });

    let request = {
        origin: locations.from,
        destination: locations.to,
        travelMode: google.maps.TravelMode.DRIVING,
    };

    directionsService.route(request, (result, status) => {
        if (status === google.maps.DirectionsStatus.OK) {
            new google.maps.DirectionsRenderer({
                directions: result,
                map: map,
                suppressMarkers: true,
            });

            $('.map').show();
            $('.map-loading').hide();
            google.maps.event.trigger(map, 'resize');
        }
    });
};
