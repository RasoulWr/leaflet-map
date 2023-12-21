<?php

function site_url($uri = ''){
    return BASE_URL . $uri;
}

function diePage($msg){
    echo "<div style = ' padding: 42px 169px; margin: 47px 89px; background: #d27272; color: white ; font-family: sans-serif; border: 1px solid black; border-radius: 5px; font-size:20px; '> $msg </div>";
    die();
}
function isAjaxRequst(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        // request is ajax
        return true;
    }else{
        // request is not ajax
        return false;
    }
}

function error($msg){
    echo "<p style= 'background: #c7bbbb; padding-top: 31px; padding-bottom: 30px; padding-left: 5px; margin-top: 5px; width: 100%; text-align: center; font-size: 30px; color: red';> {$msg}</p>";
}

function dd($tasks){
    echo "<pre style = 'background: #ffffff; color: #1668e4; font-size: 15px; padding: 15px 15px; margin: 5px 10px; border-radius: 7px; border-left: 2px  solid brown; border-right: 2px  solid brown; z-index: 999; position: relative;'>";
    var_dump($tasks);
    echo "</pre>";
    die();
}
