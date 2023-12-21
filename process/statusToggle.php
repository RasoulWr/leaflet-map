
<?php
include "../bootstrap/init.php";
if(!isAjaxRequst()){
    diePage("Invalid Request!");
}
if(is_null($_POST['locationId']) and !is_numeric($_POST['locationId'])){
    die('Inavalid Location');
}

// Ajax requset is ok 
echo toggleStatus($_POST['locationId']);