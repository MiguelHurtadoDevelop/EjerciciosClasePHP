<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Idioma</title>

</head>
<body>

<form action="" method="post">
    <label for="producto">Producto:</label>
    <input name="producto" id="producto" type="text" ><br><br>

    <label for="cantidad">Cantidad</label>
    <input name="cantidad" id="cantidad" type="number" ><br><br>

    <button type="submit" >enviar</button>
    <a href="carrito.php">Comprar</a>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
        if($_SESSION['producto']=$_POST['producto']){

        }else{
            $_SESSION['producto']=$_POST['producto'];

        }
    }
}
?>


</body>
</html>
