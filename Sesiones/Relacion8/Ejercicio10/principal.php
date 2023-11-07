<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {

        if (($_POST['Usuario'] == 'usuario') && ($_POST['Contraseña'] == '1234')) {

            session_start();
            $_SESSION['Usuario'] = $_POST['Usuario'];
            header("Location:otrapagina.php");
        } else {
            echo "revisa usuario y contraseñas";
        }
    }
}
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Idioma</title>

</head>
<body>

<form action="" method="post">
    <label for="Usuario">Nombre de usuario</label>
    <input name="Usuario" id="Usuario" type="text" ><br>

    <label for="Contraseña">Contraseña</label>
    <input name="Contraseña" id="Contraseña" type="text" ><br>

    <button type="submit" >enviar</button>

</form>



</body>
</html>
