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
            $m_en="hello";
            $m_es="hola";
            $m_it="ciao";
            
            $idioma="es";
            
            $bienbenida = "m_".$idioma;
            echo "¡". $$bienbenida."!";
        ?>
        
    </body>
</html>
