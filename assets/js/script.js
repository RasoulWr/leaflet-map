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


 map.on("dblclick",function(event){
alert(event.latlng.lat +","+event.latlng.lng)
// 1: add marker in clicked position
L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);
// 2: open modal (form) for save the cliked position
$('.modal-overlay').fadeIn(1000);
$('#lat-display').val(event.latlng.lat);
$('#lng-display').val(event.latlng.lng);
// 3: fill the form and submit location for send to server
$('#l-type').val(0);
$('#l-title').val('');
$('.ajax-result').html('');

// done 4: save location in database (status : pending review)
// done 5: review location and verify if ok 
 })



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

//setInterval(locate,5000);
//L.marker([35.28119,47.419]).addTo(map).bindPopup("موقیت مکانی من");

// calculate distance between two points

let
_firstLatLng, //holding first marker latitude and longitude
_secondLatLng,//holding second marker latitude and longitude
_polyline,    //holding polyline object
merkerA= null,
markerB = null;
map.on('click', function(e) {
    if (!_firstLatLng) {

        //get first point latitude and longitude
        _firstLatLng = e.latlng;

        //create first marker and add popup
        markerA = L.marker(_firstLatLng).addTo(map).bindPopup('مکان اول<br/>' + e.latlng).openPopup();


    } else if (!_secondLatLng) {
        //get second point latitude and longitude
        _secondLatLng = e.latlng;


        //create second marker and add popup
        markerB = L.marker(_secondLatLng).addTo(map).bindPopup('مکان دوم<br/>' + e.latlng).openPopup();


        //draw a line between two points
        _polyline = L.polyline([_firstLatLng, _secondLatLng], {
            color: 'red'
        });

        //add the line to the map
        _polyline.addTo(map);
        //get the distance between two points
        let _length = map.distance(_firstLatLng, _secondLatLng);

        //display the result
        document.getElementById('length').innerHTML = (_length/1000).toFixed(2) + ' کیلومتر';
    } else {

        //if already we have two points first we remove the polyline object
        if (_polyline) {
            map.removeLayer(_polyline);
            _polyline = null;
        }

        //get new point latitude and longitude
        _firstLatLng = e.latlng;

        //remove previous markers and values for second point
        map.removeLayer(markerA);
        map.removeLayer(markerB);
        _secondLatLng = null;

        //create new marker and add it to map
        markerA = L.marker(_firstLatLng).addTo(map).bindPopup('مکان اول<br/>' + e.latlng).openPopup();

    }

 
});




//below code used for submmited form and force to send by ajax
$(document).ready(function() {
    
    $('form#addLocationForm').submit(function(e) {
        e.preventDefault(); // prevent form submiting
        var form = $(this);
        var resultTag = form.find('.ajax-result');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                resultTag.html(response);
                       
                //  $('.modal-overlay').fadeOut(3000);
            }

        })
       
    });




    

    $('.modal-overlay .close').click(function() {
        $('.modal-overlay').fadeOut();
    });
});







