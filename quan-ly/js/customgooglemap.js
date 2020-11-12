let map, infoWindow, pos, marker_batdau,marker_ketthuc, curentlocation;
var location_start={ lat:20.824841,lng: 106.726847};
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: location_start,
        zoom: 11,
        rotateControl: true,
    });
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Vị trí của bạn";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    curentlocation=pos;
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Vị trí của bạn");
                    infoWindow.open(map);
                    map.setCenter(pos);
                    map.setZoom(12);
                    new google.maps.Marker({
                        position: map.getCenter(),
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 5,
                            fillColor: "blue",
                            fillOpacity: 0.8,
                            strokeColor: "blue",
                            strokeWeight: 14,
                        },
                        draggable: false,
                        map: map,
                    });
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}
$('#diem_batdau').change(function(){
    var diem_batdau = $('#diem_batdau').val();
    drawMarkerStart(diem_batdau);
});
$('#diem_den').change(function(){
    var ketthuc = $('#diem_den').val();
    drawMarkerEnd(ketthuc);
});
function drawMarkerEnd(diem_den){
    if(marker_ketthuc!=null) marker_ketthuc.setMap(null);
    if(diem_den==-1){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    curentlocation=pos;
                    map.setCenter(pos);
                    map.setZoom(12);
                    marker_ketthuc = new google.maps.Marker({
                        draggable: false,
                        map: map,
                        position: pos,
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 5,
                            fillColor: "blue",
                            fillOpacity: 0.8,
                            strokeColor: "blue",
                            strokeWeight: 14,
                        },
                    });
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        }
    }
    else{
        var res = diem_den.trim().split(",");
        var locate={lat:parseFloat(res[0]),lng: parseFloat(res[1])};
        marker_ketthuc =  new google.maps.Marker({
            position: locate,
            draggable: false,
            map: map,
        });
        map.setCenter(locate);
        map.setZoom(10);
    }
}
function drawMarkerStart(diem_batdau){
    if(marker_batdau!=null) marker_batdau.setMap(null);
    if(diem_batdau==-1){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    curentlocation=pos;
                    map.setCenter(pos);
                    map.setZoom(12);
                    marker_batdau = new google.maps.Marker({
                        draggable: false,
                        map: map,
                        position: pos,
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 5,
                            fillColor: "blue",
                            fillOpacity: 0.8,
                            strokeColor: "blue",
                            strokeWeight: 14,
                        },
                    });
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        }
    }
    else{
        var res = diem_batdau.trim().split(",");
        var locate={lat:parseFloat(res[0]),lng: parseFloat(res[1])};
        marker_batdau =  new google.maps.Marker({
            position: locate,
            draggable: false,
            map: map,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 5,
                fillColor: "blue",
                fillOpacity: 0.8,
                strokeColor: "blue",
                strokeWeight: 14,
            },
        });
        map.setCenter(locate);
        map.setZoom(10);
    }
}
