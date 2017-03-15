import api from '../api';
import style from './style';

export default () => {
    let map = new google.maps.Map(document.getElementsByClassName('map')[0], {
        center: {lat: -34.397, lng: 150.644},
        zoom: 3,
        disableDefaultUI: true,
        disableDoubleClickZoom: true,
        draggable: false,
        scrollwheel: false,
        styles: style,
    });

    api.getDirections(locations.from, locations.to)
        .then(result => {
            let path = google.maps.geometry.encoding.decodePath(result);

            new google.maps.Polyline({
                clickable: false,
                map: map,
                path: path,
                strokeColor: "#d80000",
                strokeWeight: 7,
            });

            var center = new google.maps.LatLngBounds();

            for (var i = 0; i < path.length; i++) {
                center.extend(path[i]);
            }

            $('.map').show();
            $('.map-loading').hide();
            google.maps.event.trigger(map, 'resize');

            map.fitBounds(center);
            map.setZoom(5);
        })
        .catch(() => {
            $('.map-container').hide();
        });
};
