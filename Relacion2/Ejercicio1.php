<?php

    function factorial($num){
        $resultado =1;
        for($x = $num; $x > 0; $x--){
            $resultado = $resultado *$x;

        }

        if($num>0){
            factorial(--$num);
        }

        return $resultado;

    }

    echo factorial(4);