import L from 'leaflet';

import markerIcon2x from 'leaflet/dist/images/marker-icon-2x.png';
import markerIcon from 'leaflet/dist/images/marker-icon.png';
import markerShadow from 'leaflet/dist/images/marker-shadow.png';

const defaultIcon = L.icon({
    iconUrl: markerIcon,
    iconRetinaUrl: markerIcon2x,
    shadowUrl: markerShadow,
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowSize: [41, 41]
});

L.Marker.prototype.options.icon = defaultIcon;

export function initMap() {
    const mapElement = document.getElementById('map');
    if (!mapElement) return;

    var map = L.map('map').setView([-6.200277, 106.532752], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([-6.200277, 106.532752]).addTo(map);

    L.circle([-6.200277, 106.532752], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);

    marker.bindPopup(
        ' <a href="https://maps.app.goo.gl/oW3pZkxKWEw92V2K7" target="_blank" style="color: black; text-decoration: none; font-weight: 500;">Hello I \' Exxass In Here</a>'
    ).openPopup();

    L.popup()
        .setLatLng([-6.200277, 106.532752])
        .setContent(
            '  <a href="https://maps.app.goo.gl/oW3pZkxKWEw92V2K7" target="_blank" style="color: black; text-decoration: none; font-weight: 500;">I \' Exxass</a> '
        )
        .openOn(map);
}
