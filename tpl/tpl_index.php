<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
  
    <!-- <script src="assets/js/leaflet.js" <php echo"?v=".rand(100,9999) ?>></script> -->

</head>
<body>
    <div class="main">
        <div class="head">
            <div class="search-box">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
            <div class="clear"></div>
            <div class="search-results" style="display:none"></div>
            </div>
            </div>
            <div class="mapContainer">
                <div id="map"></div>
            </div>
            <img src="assets/img/current.png" class="currentLoc">
        </div>
    

       <script src="assets/js/script.js"></script>
        
</body>
</html>