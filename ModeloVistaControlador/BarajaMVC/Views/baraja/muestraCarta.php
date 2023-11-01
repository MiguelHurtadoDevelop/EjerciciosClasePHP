<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos de Vivienda</title>

</head>
<body>
<?php
    $palo = $_GET['palo'];
    $numero = $_GET['numero'];

$image = "./imagenes/".$palo."_".$numero .".jpg";

if(file_exists($image)){
    echo"<img src='$image'/>";

}
else{
    echo "No se ha encontrado esta carta";
}

?>
</body>
</html>
