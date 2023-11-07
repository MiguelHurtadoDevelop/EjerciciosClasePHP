<?php
session_name("manolo");
session_start();
if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=1;
    echo "hola";
}else{
    $_SESSION['contador']++;
    echo "hola por ".$_SESSION['contador']." vez<br>";
}

echo"el valor de session es: ".session_id()."<br>";
echo"el valor de la cookie de la session es: ".$_COOKIE['manolo']."<br>";
echo session_name();