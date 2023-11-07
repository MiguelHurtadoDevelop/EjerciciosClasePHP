<?php
if(isset($_POST['idioma'])){

    setcookie('idioma',$_POST['idioma']);

    if($_POST['idioma'] === "es"){

        $valorEspanol = "checked";
        $valorIngles="";

    }else {

        $valorEspanol = "";
        $valorIngles="checked";
    }
}else {
    if (isset($_COOKIE['idioma'])) {
        $idioma = $_COOKIE['idioma'];
        if ($idioma = 'es') {
            $valorEspanol = "checked";
            $valorIngles = "";
        } else {
            $valorEspanol = "";
            $valorIngles = "checked";

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
        Español<input type="radio" name="idioma" value ="es" <?php echo $valorEspanol?>>
        Ingles<input type="radio" name="idioma" value ="in" <?php echo $valorIngles?>>


        <button type="submit">Cambiar Idioma</button>
    </form>
    <hr>
    <?php
    if(isset($_COOKIE['idioma']))

        $idioma = $_COOKIE['idioma'];

    if($idioma == "es"){
        echo"hola";
    }else {

        echo"hello";
    }
    ?>

</body>
</html>
