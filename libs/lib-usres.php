<?php


function isLoggedIn(){
    return isset($_SESSION['login']) ;
}

function logIn($username,$password){
    global $user_admins;
    if(key_exists($username,$user_admins) &&
    password_verify($password,$user_admins[$username])){
        $_SESSION['login'] = 1;
        return true;
    }else{
        return false;
    }
}

function logOut(){
    unset($_SESSION['login']);
}