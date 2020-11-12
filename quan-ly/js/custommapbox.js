var phuongtien="driving";
var traffic="Ô tô";
var  end= new Array();
function ConvertLocation(location){
    var array= new Array();
    if(location==-1){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                array.push(position.coords.longitude);
                array.push(position.coords.latitude);
            });
        }
        else {
            alert("Có lỗi xảy ra!");
        }
    }
    else {
        var res = location.trim().split(",");
        array.push(parseFloat(res[1]));
        array.push(parseFloat(res[0]));
    }
    return array;
}
var start = new Array();
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
}
function showPosition(position) {
    start=[position.coords.longitude,position.coords.latitude];
    end=start;
}
$('#dia_danh').change(function(){
    var value = $('#dia_danh').val();
    var location=ConvertLocation(value);
    getRoute(location);
    end=location;
    drawLocate(end);
});
$('#phuong_tien').change(function(){
    phuongtien = $('#phuong_tien').val();
    if(!checkIsTruncate(start,end)) getRoute(end);
    traffic=$('#phuong_tien option:selected').html();
    drawLocate(end);
});
mapboxgl.accessToken = 'pk.eyJ1IjoibXJzaGludGxocCIsImEiOiJja2dxZHZ1bHkwd3IwMnJzMzd3eXliYTBlIn0.FnVm3yCkcyY4qeIq9rNCYA';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v10',
    center: [106.709527, 20.845424], // starting position
    zoom: 10
});
// set the bounds of the map
// var bounds = [[-123.069003, 45.395273], [-122.303707, 45.612333]];
// map.setMaxBounds(bounds);

// initialize the map canvas to interact with later
var canvas = map.getCanvasContainer();

// an arbitrary start will always be the same
// only the end or destination will change

function checkIsTruncate(start, end){
    if(start.length!=end.length) return false;
    for(var i=0;i<start.length;i++){
        if(start[i]!=end[i]) return  false;
    }
    return true;
}
// this is where the code for the next step will go

// create a function to make a directions request
function getRoute(end) {
    // make a directions request using cycling profile
    // an arbitrary start will always be the same
    // only the end or destination will change
    // driving, cycling, walking, driving-traffic,
    var url = 'https://api.mapbox.com/directions/v5/mapbox/'+phuongtien+'/' + start[0] + ',' + start[1] + ';' + end[0] + ',' + end[1] + '?steps=true&overview=full&language=vi&geometries=geojson&access_token=' + mapboxgl.accessToken;

    // make an XHR request https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
    var req = new XMLHttpRequest();
    req.open('GET', url, true);
    req.onload = function() {
        var json = JSON.parse(req.response);
        console.log(json);
        var data = json.routes[0];
        var distance=data.distance;
        var route = data.geometry.coordinates;
        var geojson = {
            type: 'Feature',
            properties: {},
            geometry: {
                type: 'LineString',
                coordinates: route
            }
        };
        // if the route already exists on the map, reset it using setData
        if (map.getSource('route')) {
            map.getSource('route').setData(geojson);
        } else { // otherwise, make a new request
            map.addLayer({
                id: 'route',
                type: 'line',
                source: {
                    type: 'geojson',
                    data: {
                        type: 'Feature',
                        properties: {},
                        geometry: {
                            type: 'LineString',
                            coordinates: geojson
                        }
                    }
                },
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': '#3887be',
                    'line-width': 5,
                    'line-opacity': 0.75
                }
            });
        }
        if(!checkIsTruncate(end,start))
        {
            marker.setLngLat(end).addTo(map);
            map.flyTo({
                center: end,
                zoom:12,
            });
        }
        // add turn instructions here at the end
        // get the sidebar and add the instructions
        var instructions = document.getElementById('instructions');
        var steps = data.legs[0].steps;
        var txt_distance="";
        if(distance>1000) txt_distance=parseFloat(distance/1000).toFixed(1) + " km";
        else txt_distance = Math.round(distance) + " mét";
        console.log(txt_distance);
        if(!checkIsTruncate(start,end)) document.getElementById('instructions').style.display = "block";
        var tripInstructions = [];
        for (var i = 0; i < steps.length; i++) {
            tripInstructions.push('<br><li>' + steps[i].maneuver.instruction) + '</li>';
            instructions.innerHTML =
                '<br><span style="font-size: 2em" class="duration">' + traffic +': (' + txt_distance + ')<br> '+
                Math.floor(data.duration / 60) +
                ' phút  </span>' +
                tripInstructions;
        }
    };
    req.send();
}

map.on('load', function() {
    // make an initial directions request that
    // starts and ends at the same location
    getRoute(start);

    // Add starting point to the map
    map.addLayer({
        id: 'point',
        type: 'circle',
        source: {
            type: 'geojson',
            data: {
                type: 'FeatureCollection',
                features: [{
                    type: 'Feature',
                    properties: {},
                    geometry: {
                        type: 'Point',
                        coordinates: start
                    }
                }
                ]
            }
        },
        paint: {
            'circle-radius': 10,
            'circle-color': '#3887be'
        }
    });
    // this is where the code from the next step will go
});
map.on('click', function(e) {
    var coordsObj = e.lngLat;
    canvas.style.cursor = '';
    var coords = Object.keys(coordsObj).map(function(key) {
        return coordsObj[key];
    });
    var endd = {
        type: 'FeatureCollection',
        features: [{
            type: 'Feature',
            properties: {},
            geometry: {
                type: 'Point',
                coordinates: coords
            }
        }
        ]
    };
    if (map.getLayer('end')) {
        map.getSource('end').setData(endd);
        document.getElementById('instructions').style.display = "none";
    } else {
        // map.addLayer({
        //     id: 'end',
        //     type: 'circle',
        //     source: {
        //         type: 'geojson',
        //         data: {
        //             type: 'FeatureCollection',
        //             features: [{
        //                 type: 'Feature',
        //                 properties: {},
        //                 geometry: {
        //                     type: 'Point',
        //                     coordinates: coords
        //                 }
        //             }]
        //         }
        //     },
        //     paint: {
        //         'circle-radius': 10,
        //         'circle-color': '#f30'
        //     }
        // });
    }
    getRoute(coords);
    end=coords;
    drawLocate(end);
});
var marker = new mapboxgl.Marker({draggable: true});
function onDragEnd() {
    var lngLat = marker.getLngLat();
    drawLocate([lngLat.lng,lngLat.lat]);
    getRoute([lngLat.lng,lngLat.lat]);
}
marker.on('dragend', onDragEnd);
function drawLocate(position){
    var coordinates = document.getElementById("coordinates");
    coordinates.style.display = 'block';
    coordinates.innerHTML = 'Kinh độ: ' + position[0] + '<br />Vĩ độ: ' + position[1];
}