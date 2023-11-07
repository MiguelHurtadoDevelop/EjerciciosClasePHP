<?php
if(isset($_POST['usuario']) && (isset($_POST['Duracion']))){
    $time = time()*$_POST['Duracion'];
    setcookie('usuario', $_POST['usuario'],$time);
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
    <input name="Usuario" type="text" >

    <label for="Duracion">Duracion de la cookie(entre 1 y 60 segundos)</label>
    <input name="Duracion" type="Number" min="1" max="60">

    <button type="submit" >Crear coockie</button>

</form>



</body>
</html>