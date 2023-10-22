<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        function compara($valor1, $valor2, $funcionComparacion):int{
            return $funcionComparacion($valor1,$valor2);
            
        }
         $comparaEnteros = function ($valor1, $valor2){
             if($valor1 > $valor2){
                 return 1;
             }
             if($valor1< $valor2){
             return -1;
             }
             return 0;
         };
         
         $numero1 = 40;
         $numero2 = 30;
         if (compara($numero1, $numero2, $comparaEnteros) == 1){
             echo "El numero 1 es mayor que el numero 2";
         }
         
        ?>
    </body>
</html>
