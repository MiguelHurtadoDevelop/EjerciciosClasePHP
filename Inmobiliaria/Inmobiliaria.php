<?php
    echo'<link rel="stylesheet" type="text/css" href="style/style.css">';

    //Cargamos los datos de viviendas.xml en $xmlString
    $xmlString = file_get_contents('viviendas.xml');

    // Creamos un objeto SimpleXMLElement a partir del contenido del archivo
    $xml = new SimpleXMLElement($xmlString);

    //Cogemos la ultima vivienda
    $ultima_vivienda=$xml->vivienda[count($xml->vivienda)-1];

    // Accedemos a los datos
    $tipo_vivienda = (string)$ultima_vivienda->tipo_vivienda;
    $zona = (string)$ultima_vivienda->zona;
    $direccion = (string)$ultima_vivienda->direccion;
    $num_dormitorios = (int)$ultima_vivienda->num_dormitorios;
    $precio = (float)$ultima_vivienda->precio;
    $tamanio = (int)$ultima_vivienda->tamanio;
    $extras = array();
    foreach ($ultima_vivienda->extra as $extra) {
        $extras[] = (string)$extra;
    }
    $foto = (string)$ultima_vivienda->foto;
    $observaciones = (string)$ultima_vivienda->observaciones;
    $ganancia = (float)$ultima_vivienda->ganancias;


    //mostramos todos los datos
    echo '<h1>Insercion de viviendas</h1>';

    echo '<div class="marco">';
    echo '<p>Estos son los parametros introducidos:</p>';

    echo '<ul style="list-style-type:disc">';
    echo '<li>Tipo de vivienda: '.$tipo_vivienda.'</li>';
    echo '<li>Zona: '.$zona.'</li>';
    echo '<li>Direccion: '.$direccion.'</li>';
    echo '<li>Numero de dormitorios: '.$num_dormitorios.'</li>';
    echo '<li>Precio: '.$precio.' €</li>';
    echo '<li>Tamaño: '.$tamanio.' Metros cuadrados</li>';
    echo '<li>extras: <ul>';

            if($extras==""){
                echo $extras;
            }else{
                foreach($extras as $extra){
                    echo '<li>'.$extra.'</li>';
                }
            }

    echo'</ul></li>';

    echo '<li>foto: <a  target="_blank" href="imagenes/'.$foto.'">'.$foto.'</a></li>';

    echo '<li>Observaciones: '.$observaciones.'</li>';
    echo '<li>Ganancias: '.$ganancia.'</li>';

    echo '</ul>';



    echo '<a href="Index.php">Incluir otra vivienda</a>';

    echo "</div>";




