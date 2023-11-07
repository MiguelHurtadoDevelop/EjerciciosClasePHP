<?php
if($_COOKIE['micookie']){
    unset($_COOKIE['micookie']);
    setcookie('micookie','',time()-100);
}

header('location:verCookies.php');