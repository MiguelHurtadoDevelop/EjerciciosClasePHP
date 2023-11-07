<?php

if(isset($_COOKIE['micookie'])){
    echo"<h3>".$_COOKIE['micookie']."</h3>";
}else{
    echo"no existe la cookie";
}