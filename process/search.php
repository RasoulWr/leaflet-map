<?php
include "../bootstrap/init.php";

if(!isAjaxRequst()){
    diePage("Invalid Request");
}
$keyword = $_POST['keyword'];
if(!isset($keyword) or empty($keyword)){
    die("نتیجه ای یافت نشد...");
}

// ajax request is ok

$locations = getLocations(['keyword'=>$keyword]);
if(sizeof($locations) == 0){
    die("نتیجه ای یافت نشد...");
}

foreach ($locations as $location){
    echo "<a href='".BASE_URL."?locId=$location->id'>
    <div class='result-item' data-lat='{$location->lat}' data-lng='{$location->lng}'>
    <span class='loc-type'>{$loc_types["$location->types"]}</span>
    <span class='loc-title'>{$location->title}</span>
    </div>
    </a>";
    
}