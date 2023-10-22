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
         $miArray[] = 45; //empieza con indice 0
         $miArray [] = 2; //indice 1
         $miArray[2] = 5; // asignación directa a un indice en concreto
         echo " Este es el primer array que hemos creado <br>";
         print_r($miArray);
         
         $otroArray = array( 34,55,77);//usando la funcio
         echo "<br> <br> Este array se ha creado con la funcion array: <br>";
         print_r(otroArray);
         
         $miOtroArray = [33,44,55,66] ;//usnado corchetes es mas limpio
         echo "<br>"
        ?>
    </body>
</html>
