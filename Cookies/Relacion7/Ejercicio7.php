<?php
if(isset($_GET['borrar']) && ($_GET['borrar'] == 'si')){

    setcookie('visitas','', time()-3000);
}else{
    if (isset($_COOKIE['visitas'])) {

        $visitas = unserialize($_COOKIE['visitas']);
    } else {

        $visitas = array();
    }

    $visitas[] = time();



    setcookie('visitas', serialize($visitas), time() + 3600 * 24 * 30);

}

if (!empty($visitas)) {
    echo "<h2>Últimas visitas:</h2>";
    echo "<ul>";
    foreach (array_reverse($visitas) as $timestamp) {
        $fecha = date('d-m-Y H:i:s', $timestamp);
        echo "<li>$fecha</li>";
    }
    echo "</ul>";
}
echo"<a href='Ejercicio7.php?borrar=si'>Borrar Cookies</a><br>";
echo"<a href='Ejercicio7.php'>Actualizar la Pagina</a>";
