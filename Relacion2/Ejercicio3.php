<?php

    $concatenador= function($a,$b){
        return ($a + $b);
    };

    $arr1 = range(1,100);
    $arr2 = range(1,2);

    $lista= array_map($concatenador, $arr1, $arr2);

    echo implode(" ", $lista);