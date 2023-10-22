<?php

if(empty($_GET["nombre"])){
    echo "Necesito saber tu nombre";
}else{
    echo "<h2>Hola ".$_GET["nombre"]."</h2>";
}