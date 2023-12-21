<?php
include "bootstrap/init.php";
$params = '';
if(isset($_GET['verified']) and in_array($_GET['verified'],['0','1'])){
    $params = $_GET['verified'];
}

if(isset($_GET['logout']) and $_GET['logout'] == 1){
    logOut();
}
if($_SERVER["REQUEST_METHOD"] =='POST'){ 
    if(!logIn($_POST["username"],$_POST['password'])){
        error("نام کاربری یا رمز عبور اشتباه است");
    }
}


if(isLoggedIn()){
    $locations = getLocations($params);
    include "tpl/tpl_adm.php";
  
}
include "tpl/tpl-adm-form.php";