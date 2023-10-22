<?php

    try{
        if(isset($_GET["longitud"])){
            if (($_GET["longitud"] > 1000) || ($_GET["longitud"] < 10)) {
                throw new exception ('Valor de pixeles incorrecto');
            } else {
                print "Longitud : " . $_GET["longitud"];
                print"<img src='https://svgsilh.com/svg/2070573.svg'  width='".$_GET["longitud"]."'>";

            }
        }else{
            throw new exception ('No se ha encontrado ningun valor para la longitud');
        }
    }catch(Exception $e) {
        echo "Ha habido un error ".$e->getMessage()."<br>";
    }