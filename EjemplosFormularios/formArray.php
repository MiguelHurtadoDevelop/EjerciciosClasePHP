<?php
    echo "Datos de contacto";

    $contacto = $_REQUEST['contacto'];

    if($contacto["confirmar"] = "check"){
        foreach ($contacto as $key => $valor){

            echo $key.":" . $valor. "<br>";
        }
    }else{
        echo "debe aceptar las condiciones";
    }

    ?>

