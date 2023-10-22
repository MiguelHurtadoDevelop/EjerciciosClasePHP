<?php

    function suma($num1, $num2){
        return $num1 + $num2;
    }

    function resta($num1, $num2){
        return $num1 - $num2;
    }

    function multiplicacion($num1, $num2){
        return $num1 * $num2;
    }

    function division( $num1 , $num2){

        if($num2 != 0){
            return $num1/ $num2;
        }else{
            return "No se puede dividir por 0";
        }

    }

    function calculador( $num1, $num2, $operacion){

        switch ($operacion) {
            case '+':
                return suma($num1, $num2);
            case '-':
                return resta($num1, $num2);
            case '*':
                return multiplicacion($num1, $num2);
            case '/':
                return division($num1, $num2);
            default:
                return "Operación no válida";
        }


    }

    if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $operacion = $_GET['operacion'];

        if (is_numeric($num1) && is_numeric($num2) && in_array($operacion, array('+', '-', '*', '/'))) {
            $resultado = calculador($num1, $num2, $operacion);
            echo "El resultado de la operación es: " . $resultado;
        } else {
            echo "Los valores ingresados no son numéricos o la operación no es válida.";
        }
    } else {
        echo "Por favor, proporciona num1, num2 y operacion en la URL.";
    }
?>

