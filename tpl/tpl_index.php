<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="assets/css/style.css<?= "?v=".rand(100,99999) ?>"/>
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
            

            <div class="modal-overlay" style="display:none;">
                <div class="modal">
                    <span class="close"> X</span>
                    <h3 class="modal-title"> ثبت مکان</h3>
                    <div class="modal-content">
                <form id="addLocationForm" action="<?= ROOT_PATH."process/addLocation.php" ?>"  method="post">
                    <div class="field-row">
                        <div class="field-title">مختصات</div>
                        <div class="field-content">
                            <input type="text" name="lat" id="lat-display" readonly style="width: 150px; text-align:center;" placeholder="عرض جغرافیایی">
                            <input type="text" name="lng" id="lng-display" readonly style="width: 150px; text-align:center;" placeholder="طول جغرافیایی">
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نام مکان</div>
                        <div class="field-content">
                            <input type="text" name="title" id="l-title" placeholder="باشگاه استقلال">
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select name="type" id="l-type">
                            <?php foreach($loc_types as $key=>$value): ?>
                                <option value="<?=$key?>"><?= $value ?></option> 
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">درخواست ثبت</div>
                        <div class="field-content">
                            <input id="" type="submit" value="ثبت">
                        </div>
                    </div>
                    <div class="ajax-result"></div>

                </form>

            </div>
        </div>

    </div>

        </div>
        <!-- jquery loading -->
       <script src="assets/js/jquery.min.js"></script>
       <script src="assets/js/script.js"></script>
        
</body>
</html>