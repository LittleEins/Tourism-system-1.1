const apiKey = 'pk.eyJ1IjoiamVyaG9tZTEyIiwiYSI6ImNsOHpkeWk4MTBsNHYzb3A0aXhwM3N2OG8ifQ.H-GhPpJAiB7I8niy2vjsVg';

var myMap = L.map('map', {
    maxZoom: 20,
    minZoom: 6,
    zoomControl: false
}).setView([16.3398435,119.8216285], 11);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 100,
}).addTo(myMap);


L.control.zoom({
    position: 'bottomright'
}).addTo(myMap);

// Bolinao Falls Mark
const bolinao_falls = L.marker([16.313238135208962, 119.85853571415453]).addTo(myMap);
// Bolinao Falls Mark
const patar_beach = L.marker([16.30598898523941, 119.77991480285729]).addTo(myMap);

// circle on map
var falls_circle = L.circle([16.313238135208962, 119.85853571415453], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(myMap);

var patar_circle = L.circle([16.30598898523941, 119.77991480285729], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(myMap);

// pop up message on map
bolinao_falls.bindPopup("<b>100</b><br>Total visit").openPopup();
