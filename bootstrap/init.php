<?php
session_start();
include "constant.php";
include ROOT_PATH . "bootstrap/config.php";
include ROOT_PATH ."libs/helpers.php";
include ROOT_PATH ."libs/lib-locations.php";


try{
    $pdo = new PDO("mysql:host={$db_config->host};dbname={$db_config->name}","{$db_config->user}","{$db_config->pass}");
    $pdo->exec("set names utf8mb4"); // for supporting utf8
} catch(PDOException $e){
    die("connection is faild!!"."{$e->getMessage()}"."in line {$e->getLine()}");
}

include ROOT_PATH."libs/lib-usres.php";