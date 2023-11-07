<?php
if(isset($_POST['aceptar'])){
    setcookie('aceptar', 'aceptado');

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Idioma</title>

</head>
<body>
<?php


if(!isset($_COOKIE['aceptar'])){
    echo"<h1>coockies</h1>";

    echo'<form action="Ejercicio5.php" method="post">';
        echo"<p>¿Aceptas nuestras cookies?</p>";
        echo'<button type="submit" name="aceptar" value="aceptado">Aceptar</button>';
    echo"</form>";

}else{
    echo"Bienvenido de nuevo";
}

?>



</body>
</html>
