<?php

if((isset($_GET["numero1"]))&&(isset($_GET["numero2"]))&&(isset($_GET["numero2"]))){
    $resultado = 0;
    switch($_GET["operacion"]){
        case "multiplicacion":

            $resultado = $_GET["numero1"] * $_GET["numero2"];
            echo $resultado;
            break;
        case "division":

            if( $_GET["numero2"] == 0){
                echo "no se puede dividir por 0";

            }else{
                $resultado = $_GET["numero1"] / $_GET["numero2"];
                echo $resultado;
            }
            break;
        case "suma":
            $resultado= $_GET["numero1"] + $_GET["numero2"];
            echo $resultado;

            break;
        case "resta":
            $resultado= $_GET["numero1"] - $_GET["numero2"];
            echo $resultado;

            break;

    }

}else {
    echo "Necesito saber el segundo numero";
}
