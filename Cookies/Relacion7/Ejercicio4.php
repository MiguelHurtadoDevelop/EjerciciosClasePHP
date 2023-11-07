<?php
    if(isset($_POST['color'])){
        setcookie('color', $_POST['color']);
        $color = $_POST['color'];
    }else{
        if(isset($_COOKIE['color'])){
            $color = $_COOKIE['color'];
        }
    }
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Idioma</title>
        <style>
            body{
                background-color: <?php  echo $color;?>;
            }
        </style>
    </head>
    <body>
        <h1>Elija el color de fondo</h1>
        <form action="" method="post">
            <input type="color" name="color" value="<?php echo $color; ?>">
            <button type="submit">Cambiar Idioma</button>
        </form>


    </body>
    </html>

