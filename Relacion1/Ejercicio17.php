<?php

try{
    if(isset($_GET["num1"]) && isset($_GET["num2"])){
        if ($_GET["num1"]<$_GET["num2"]) {

            for($i = $_GET["num1"]; $i < $_GET["num2"]; $i++){

                if($i%2 != 0){
                    echo " $i,";
                }

            }

        } else {
            throw new exception ('El numero 1 es mas grande que el numero dos');

        }
    }else{
        throw new exception ('No se ha encontrado ningun valor para la longitud');
    }
}catch(Exception $e) {
    echo "Ha habido un error ".$e->getMessage()."<br>";
}