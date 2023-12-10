var defaultLocation = [35.7581166,51.3640];
var defaultZoom = 13;
const map = L.map('map').setView(defaultLocation,defaultZoom);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: ' <a href="https://www.tarafdari.com.</a>'
}).addTo(map);


document.getElementById('map').style.setProperty('height',window.innerHeight + 'px');

// set new location
map.setView([40.7590322,-74.051],15);//newyork manhatan


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
map.on("dblclick",function(event){
    
    L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);
    // 1: add marker in clicked position
    // 2: open modal (form) for save the cliked position
    // 3: fill the form and submit location for send to server
    // 4: save location in database (status : pending review)
    // 5: review location and verify if ok 
})

setTimeout(() => {
   
}, 2000);


