<?php

if(file_exists("empleados.xml")){

    $datos = simplexml_load_file("empleados.xml");
    echo"<br>";

    if($datos === false){
        echo "error al leer el archivo";
    }else{

    }

}