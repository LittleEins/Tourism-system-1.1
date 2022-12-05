const apiKey = 'pk.eyJ1IjoiamVyaG9tZTEyIiwiYSI6ImNsOHpkeWk4MTBsNHYzb3A0aXhwM3N2OG8ifQ.H-GhPpJAiB7I8niy2vjsVg';

$(document).ready(function ()
{

    load_map();

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



    function load_map ()
    {
        $.ajax ({
            type: "GET",
            url: "/locations/map",
            dataType: "json",
            success: function (response) 
            {
    
                let l = response.locations.length;

                var mapHover = document.querySelector('#mapHover');


                for (let i = 0; i < l; i++)
                {
                    var name = response.locations[i].name;
                    var names = name;
                    var count_visit = response.locations[i].visit_count;

                     // split naming if have space
                    var nameLocation = response.locations[i].name;
                    var fistWord = nameLocation.split(" ")[0]

                    var locName = document.querySelector('#'+fistWord+'');

                    // change marker
                    // checkp
                    var LeafIcon1 = L.Icon.extend({
                        options: {
                           iconSize:     [38, 40],
                           shadowSize:   [50, 64],
                           iconAnchor:   [19, 37],
                           toollipAchor: [20,400],
                           popupAnchor:  [-3, -40]
                        }
                    });

                    var check_point = new LeafIcon1({
                        iconUrl: '/user/assets/map_img/stop.png',
                    })

                    // pin 
                    var LeafIcon2 = L.Icon.extend({
                        options: {
                           iconSize:     [30, 35],
                           shadowSize:   [50, 64],
                           iconAnchor:   [15, 37],
                           toollipAchor: [20,400],
                           popupAnchor:  [-3, -40]
                        }
                    });

                    var pin = new LeafIcon2({
                        iconUrl: '/user/assets/map_img/beachd2.png',
                    })

                    // office
                    var LeafIcon3 = L.Icon.extend({
                        options: {
                           iconSize:     [30, 35],
                           shadowSize:   [50, 64],
                           iconAnchor:   [15, 37],
                           toollipAchor: [20,400],
                           popupAnchor:  [-3, -40]
                        }
                    });

                    var office = new LeafIcon3({
                        iconUrl: '/user/assets/map_img/office.png',
                    })


                    // Mark
                    if (response.locations[i].type == '1')
                    {
                        var name = L.marker([response.locations[i].latitude, response.locations[i].longitude], {icon: check_point}).addTo(myMap);
                    }
                    else if (response.locations[i].type == '2')
                    {
                        var name = L.marker([response.locations[i].latitude, response.locations[i].longitude], {icon: office}).addTo(myMap);
                    }
                    else
                    {
                        var name = L.marker([response.locations[i].latitude, response.locations[i].longitude], {icon: pin}).addTo(myMap);
                    }
    
                    if (response.locations[i].type == '1')
                    {
                         // side text
                        var toollip = L.tooltip({
                            permanent: true,
                            offset: [15,-15],
                        }).setContent(response.locations[i].visit_count);

                        name.bindTooltip(toollip);
                    }

                    //  circle on map
                    var vir_map = L.circle([response.locations[i].latitude, response.locations[i].longitude], {
                        color: 'black',
                        fillColor: response.locations[i].color,
                        fillOpacity: 0.2,
                        radius: 500
                    }).addTo(myMap);

                    // add text circle
                    var tundol = L.divIcon({
                        className: 'my-div-icon',
                        html: '<h1 style="font-size:10px; width:fit-content; height:300px;">'+response.locations[i].name+'</h1>',
                        iconAnchor: [15, -7]
                    });
                    // you can set .my-div-icon styles in CSS
                    
                    L.marker([response.locations[i].latitude, response.locations[i].longitude], {
                        icon: tundol
                    }).addTo(myMap);
    
                    // pop up message on map
                   
                    // checkpoint
                    if (response.locations[i].type == '1')
                    {
                        if (response.locations[i].img_name != null)
                        {
                            name.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box; text-align:center;'>\
                            <div style='font-size: 10px;'>"+response.locations[i].name+" Visited</div>\
                            <div><img src='/user/assets/map_img/"+response.locations[i].img_name+"' style='height:100px; width: 100px; margin: 5px 0;'></div\
                            </div>");
                        }
                        else
                        {
                            name.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box; text-align:center;'>\
                            <div style='font-size: 10px;'>"+response.locations[i].name+" Visited</div>\
                            </div>");
                        }
                    }
                    else
                    {
                        // pin
                        if (response.locations[i].img_name != null)
                        {
                            // with img
                            name.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box; text-align:center;'>\
                            <div style='font-size: 10px;'>"+response.locations[i].name+" Visited</div>\
                            <div><div><img src='/user/assets/map_img/"+response.locations[i].img_name+"' style='height:100px; width: 100px; margin: 5px 0;'></div\
                            </div><a style='text-align:center; font-weight: bold;' href='"+response.locations[i].link_url+"'>Visit</a>\
                            </div>");
                        }
                        else
                        {
                            // no img
                            name.bindPopup("<div style='width:fit-content; height:fit-content; display:flex; flex-direction: column; justify-content:center; align-items:center; box-sizing:border-box; text-align:center;'>\
                            <div style='font-size: 10px;'>"+response.locations[i].name+" Visited</div>\
                            <div><a style='text-align:center; font-weight: bold;' href='"+response.locations[i].link_url+"'>Visit</a>\
                            </div>");
                        }
                    }

                    // zoom in
                    locName.addEventListener("mouseover", ()=>
                    {
                       
                        myMap.flyTo([response.locations[i].latitude, response.locations[i].longitude], 14);

                    },false);

                    mapHover.addEventListener("mouseover", ()=>{
                        myMap.flyTo([16.3398435,119.8216285], 11);
                    },false);
                }
            }
        });
    }


       
});
