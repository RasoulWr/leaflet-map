<?php
include "bootstrap/init.php";
$location = false;
if(isset($_GET['locId']) and is_numeric($_GET['locId'])){
    $location = getLocation($_GET['locId']);
    // dd($location);
}
include "tpl/tpl_index.php";
