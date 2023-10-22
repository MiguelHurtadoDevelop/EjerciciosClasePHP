<?php

    function matriculaValida($matricula){
        $longitud = strlen($matricula);

        if($longitud !== 7 ){
            return ("La matricula no es valida");
        }
        else{
            $Numeros = substr($matricula,0,4);
            $Letras = substr($matricula,4);

            if((ctype_digit($Numeros)) && (ctype_upper($Letras))){
                return "La matricula es valida";
            }
            else{
                return ("La matricula no es valida");
            }
        }
    }

    $mat = "6565BLH";
    echo matriculaValida($mat);