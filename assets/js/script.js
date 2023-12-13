var defaultLocation = [35.7581166,51.3640];
var defaultZoom = 13;
const map = L.map('map').setView(defaultLocation,defaultZoom);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: ' <a href="https://www.tarafdari.com.</a>'
}).addTo(map);


document.getElementById('map').style.setProperty('height',window.innerHeight + 'px');

// set new location
// map.setView([40.7590322,-74.051],15);//newyork manhatan


// marker and pin
L.marker([35.7581166,51.3640]).addTo(map).bindPopup("رستوران داش نصرت").openPopup();
// map.on('popupopen',function(){
//     alert("popup opened");
// })
//L.marker([35.6997544,51.32796]).addTo(map).bindPopup("منزل تیمور نمازی");



// set view boundline for current window
// var northBound = map.getBounds().getNorth();
// var southBound = map.getBounds().getSouth();
// var eastBound = map.getBounds().getEast();
// var westBound = map.getBounds().getWest();




// Use map Events
// map.on("zoomend",function(){
//     // when we zoom an map or do move an map , windows is changed , we must send boundlines to server for getting locations an this new window
// // 1: get bound lines
// // 2: send bound lines to server
// // 3: search location in map window (we must do query in data base)
// // 4: display loacation markers in map
// });


// map.on("dblclick",function(event){
    
//     L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);
//     // 1: add marker in clicked position
//     // 2: open modal (form) for save the cliked position
//     // 3: fill the form and submit location for send to server
//     // 4: save location in database (status : pending review)
//     // 5: review location and verify if ok 
// })



var current_position, current_accuracy;
  map.on('locationfound', function(e) {
    // if position defined, then remove the existing position marker and accuracy circle from the map
    if (current_position) {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy;
    current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("دقت تقریبی: " + radius + " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);
});
   map.on('locationerror', function(e) {
      alert(e.message);
});

function locate() {
    map.locate({ setView: true, maxZoom: defaultZoom });
}

setInterval(locate,5000);




// map.locate({setView: true, watch: true}) /* This will return map so you can do chaining */
//   .on('locationfound', function(e){
//     var marker = L.marker([e.latitude, e.longitude]).bindPopup('Your are here :)');
//     var circle = L.circle([e.latitude, e.longitude], e.accuracy/2, {
//         weight: 1,
//         color: 'blue',
//         fillColor: '#cacaca',
//         fillOpacity: 0.2
//     });
//     map.addLayer(marker);
//     map.addLayer(circle);
//     // marker.addTo(map);1
//     // circle.addTo(map);
// })
//   .on('locationerror', function(e){
//     console.log(e);
//     alert("Location access denied.");
// });






//L.marker([35.28119,47.419]).addTo(map).bindPopup("موقیت مکانی من");


    







