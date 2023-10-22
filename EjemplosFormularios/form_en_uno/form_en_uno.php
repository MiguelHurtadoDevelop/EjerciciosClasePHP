<?php
    if($_SERVER['REQUEST_METHOD']== "POST"){
        if($_POST['usuario']==="usuario" and $_POST["clave"]==="1234"){
            header("Location: bienvenido.php");
        }else{
            $err = true;
        }
    }

?>
<!DOCTYPE HTML>
<html lang ="es">
<head>
    <meta charset="utf-8"/>
    <title>formulario de login</title>

</head>
<body>
<?php
    if(isset($err)){
        echo "<p>Revise usuario y contraseña</p>";
    }
?>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>
        <label for="usuario">Usuario:</label>
        <input value = "<?php if(isset($_POST['usuario']))echo $_POST['usuario']?>"
        id="usuario" name="usuario" type="text">
    </p>
    <p>
        <label for="clave">Contraseña: </label>
        <input type="password" id="clave" name="clave">
    </p>



    <button type="submit" >Enviar</button>
</form>


</body>


</html>
