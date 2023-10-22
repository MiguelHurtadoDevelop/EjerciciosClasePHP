<?php
    function contrasenaValida($cadena){
        $longitud = strlen($cadena);

        if($longitud > 15 || $longitud < 6){
            return false;
        }
        if (!preg_match('/[a-z]/', $cadena)) {
            return false;
        }
        if (!preg_match('/[0-9]/', $cadena)) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $cadena)) {
            return false;
        }

        if (!preg_match('/[#@!_-]/', $cadena)) {
            return false;
        }

        return true;

    }

    if(contrasenaValida('aB####a2a')){
        echo('La contraseña esta ok');
    }else{
        echo('La contraseña no esta ok');
    }