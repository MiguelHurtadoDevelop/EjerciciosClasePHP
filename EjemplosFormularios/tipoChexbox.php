<?php
    echo"<h1>Extras del imueble</h1>";
    $extras = $_REQUEST['extras'];
    foreach ($extras as $extra){
        print("$extra<br>");
    }
    ?>