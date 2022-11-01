const apiKey = 'pk.eyJ1IjoiamVyaG9tZTEyIiwiYSI6ImNsOHpkeWk4MTBsNHYzb3A0aXhwM3N2OG8ifQ.H-GhPpJAiB7I8niy2vjsVg';

$(document).ready(function ()
{

    
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
    // Patar Beach Mark
    const patar_beach = L.marker([16.30598898523941, 119.77991480285729]).addTo(myMap);
    // Tundol Beach Marck
    const light_house = L.marker([16.307593819502713, 119.78571177268057]).addTo(myMap);
    // tourism office
    const Bolinao_tourism_office = L.marker([16.38876706227714, 119.89310398880232]).addTo(myMap);
    
    // circle on map
    var Bolinao_tourism_office_circle = L.circle([16.38876706227714, 119.89310398880232], {
        color: 'blue',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(myMap);

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

    var light_house_circle = L.circle([16.307593819502713, 119.78571177268057], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(myMap);

    // add text circle
    var bolinao_tourism_office_div_icon = L.divIcon({
        className: 'my-div-icon',
        html: '<h1 style="font-size:10px; width:fit-content; height:300px;">Tourism Office</h1>',
        iconAnchor: [15, -7]
    });
      // you can set .my-div-icon styles in CSS
      
      L.marker([ 16.38876706227714, 119.89310398880232], {
        icon: bolinao_tourism_office_div_icon
    }).addTo(myMap);

    var light_house_div_icon = L.divIcon({
        className: 'my-div-icon',
        html: '<h1 style="font-size:10px; width:fit-content; height:300px;">Tundol Beach</h1>',
        iconAnchor: [15, -7]
    });
      // you can set .my-div-icon styles in CSS
      
      L.marker([16.307593819502713, 119.78571177268057], {
        icon: light_house_div_icon
    }).addTo(myMap);

    var falls = L.divIcon({
        className: 'my-div-icon',
        html: '<h1 style="font-size:10px; width:fit-content; height:300px;">Bolinao Falls</h1>',
        iconAnchor: [15, -7]
    });
      // you can set .my-div-icon styles in CSS
      
      L.marker([16.313238135208962, 119.85853571415453], {
        icon: falls
    }).addTo(myMap);

    var patar = L.divIcon({
        className: 'my-div-icon',
        html: '<h1 style="font-size:10px; width:fit-content; height:300px;">Patar Beach</h1>',
        iconAnchor: [15, -7]
    });
      // you can set .my-div-icon styles in CSS
      
      L.marker([16.30598898523941, 119.77991480285729], {
        icon: patar
    }).addTo(myMap);

    // fetch data visit
    setInterval(function (){
        counts();
       
    },5000);

    
       
    // pop up message on map
    Bolinao_tourism_office.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box;'>\
    <div style='font-size: 10px;'>Tourism Office</div>\
    <div><a href='https://goo.gl/maps/3z2huBXDSWNYnB6B8'>Visit</a>\
    </div>");

    bolinao_falls.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box;'>\
    <div style='font-size: 10px;'>Falls Visited</div>\
    <div>Login to view\
    </div>");

    console.log('hello');

    patar_beach.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box;'>\
    <div style='font-size: 10px;'>Patar Visited</div>\
    <div>Login to view\
    </div>");

    light_house.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box;'>\
    <div style='font-size: 10px;'>Patar Visited</div>\
    <div>Login to view\
    </div>");

});
