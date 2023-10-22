<?php

    function esPrimo($numero){
        $cont = 0;
        for ($i = 1; $i<= $numero; $i++){
            if($numero % $i==0){
                $cont++;
            }
        }

        if($cont == 2){
            return ("Es primo");
        }
        else{
            return ("No es primo");
        }
    }

    echo esPrimo(3);