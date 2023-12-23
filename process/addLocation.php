<?php 

include '../bootstrap/init.php';

if(!isAjaxRequst()){
    diePage("Invalid Request!");
}
// request is Ajax and OK
if(insertLocation($_POST)){
    echo "مکان با موفقیت در پایگاه داده ثبت شد و منتظر تایید مدیر است.";
}else{
    echo "لوکیشن تکراری است لطفا موقعیت را تغییر دهید!!";
}
