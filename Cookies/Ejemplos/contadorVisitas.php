<?php
if(!isset($_COOKIE['visitas'])){
    setcookie('visitas','1',time()+3600*24);
    $frase= " , es la primera vez que nos visitamo";

}else{
    $visitas = (int) $_COOKIE['visitas'];
    $visitas++;
    setcookie('visitas', $visitas, time() +3600*24);
    $frase = " , has visitasdo nuestra web ". $visitas. " veces";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi primera página web</title>
</head>
<body>
    <h2>Hola<?=$frase?></h2>
</body>
</html>