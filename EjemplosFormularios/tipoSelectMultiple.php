<?php
echo"<h1>Extras de color</h1>";
$colores = $_REQUEST['colores'];
foreach ($colores as $color){
    print("$color<br>");
}
?>