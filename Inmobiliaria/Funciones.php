<?php

// Función que valida el tipo de vivienda pasada por $tipo_vivienda
function validar_tipo_vivienda($tipo_vivienda):bool{

    $tipos=["Piso","Adosado","Chalet","Casa"];

    if(!in_array( $tipo_vivienda, $tipos)){
        return false;
    }
    return true;
}

// Función que valida la zona de la vivienda pasada por $zona

function validar_zona($zona):bool{

    $zonas=["Zaidín", "Centro", "Chana", "Albaicín", "Sacromonte", "Realejo"];

    if(!in_array($zona, $zonas)){
        return false;
    }
    return true;
}

// Función que valida la dirección de la vivienda pasada por $direccion

function validar_direccion($direccion):bool {

    if (empty($direccion)) {

        return false;
    }


    if (strlen($direccion) > 255) {

        return false;
    }


    if (!preg_match("/^[àÀÈèÌìòùÒÙñ,a-zA-Z0-9\s\/]+$/", $direccion)) {
        return false;
    }

    return true;
    }

// Función que valida el numero de dormitorios de la vivienda pasado por $num_dormitorios


function validar_num_dormitorios ($num_dormitorios):bool {

    if (empty($num_dormitorios)) {
        return false;
    }

    if (!is_numeric($num_dormitorios) || $num_dormitorios < 0 || $num_dormitorios > 5) {

        return false;
    }
    if(!filter_var($num_dormitorios, FILTER_VALIDATE_FLOAT)){
        return false;
    }
    if (!preg_match("/^[0-9.]+$/", $num_dormitorios)) {
        return false;
    }

    return true;
}

// Función que valida el precio de la vivienda pasado por $precio

function validar_precio($precio):bool {

    if (empty($precio)) {
        return false;
    }
    if(!filter_var($precio, FILTER_VALIDATE_FLOAT)){
        return false;
    }
    if (!preg_match("/^[0-9.]+$/", $precio)) {
        return false;
    }

    if (!is_numeric($precio)) {
        return false;
    }
    if($precio <= 0){
        return false;

    }

    return true;
}


// Función que valida el tamaño de la vivienda pasado por $metros_cuadrados


function validar_metros_cuadrados($metros_cuadrados):bool {

    if (empty($metros_cuadrados)) {
        return false;
    }
    if(!filter_var($metros_cuadrados, FILTER_VALIDATE_FLOAT)){
        return false;
    }
    if (!preg_match("/^[0-9.]+$/", $metros_cuadrados)) {
        return false;
    }

    if (!is_numeric($metros_cuadrados)) {
        return false;
    }
    if($metros_cuadrados <= 0){
        return false;

    }

    return true;
}

// Función que valida la foto de la vivienda pasada por $foto

function validar_foto($foto):bool{

    if($foto ["type"]!="image/jpeg"){

        return false;

    }else if($foto["size"] > 100000){

        return false;
    }
    return true;
}

// Función que sube la foto de la vivienda pasada por $foto

function subir_foto($fichero):bool {

    if(!is_dir('imagenes')){

        mkdir('imagenes',0777);
    }
    if(is_uploaded_file($fichero["tmp_name"])){

        $nombreDirectorio = "imagenes/";
        $nombreFichero = $fichero["name"];

        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(is_file($nombreCompleto)){
            $idUnico = time();
            $nombreFichero = $idUnico."-". $nombreFichero;
        }
        $res= move_uploaded_file($fichero["tmp_name"], $nombreDirectorio.$nombreFichero);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    return true;
}



// Función que valida los extras de la vivienda pasada por $extras

function validar_extras($extras):bool{
    $tipos =["Jardín", "Piscina", "Garaje"];

    if(!empty($extras)){
        foreach ($extras as $extra){
            if(!in_array($extra, $tipos)){
                return false;
            }
        }
    }
    return true;
}

// Función que valida las observaciones de la vivienda pasada por $observaciones

function validar_observaciones($observaciones):bool{

    if (!preg_match("/^[àÀÈèÌìòùÒÙ@ñ,a-zA-Z0-9\s\/]+$/", $observaciones)) {

        return false;
    }

    return true;
}


//Función que calcula las ganancias por vivienda a partir de $zona, $tamanio, $precio
function calcular_ganancia($zona, $tamanio,  $precio):float{
    $ganancia=0;
    switch($zona){
        case "Centro":
            if($tamanio> 100){
                $ganancia = ($precio/100)*35;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*30;
            }
            break;
        case "Zaidín":
            if($tamanio> 100){
                $ganancia = ($precio/100)*28;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*25;
            }
            break;
        case "Chana":
            if($tamanio> 100){
                $ganancia = ($precio/100)*25;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*22;
            }
            break;
        case "Albaicín":
            if($tamanio> 100){
                $ganancia = ($precio/100)*35;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*20;
            }
            break;
        case "Sacromonte":
            if($tamanio> 100){
                $ganancia = ($precio/100)*25;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*22;
            }
            break;
        case "Realejo":
            if($tamanio> 100){
                $ganancia = ($precio/100)*28;

            }else if($tamanio < 100){
                $ganancia = ($precio/100)*25;
            }
            break;
        default:
            echo "No se puede calcular la ganancia";

    }
    return $ganancia;
}

//Función que sube los datos a un xml, en este caso viviendas.xml
function subirXML($tipo_vivienda,$zona,$direccion,$num_dormitorios,$precio,$tamanio,$foto, $extras,$observaciones,$ganancia)
{
    $xmlFilePath = 'viviendas.xml';

    $xml = simplexml_load_file($xmlFilePath);
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    // Locate the target element (assuming it's <lista_vivienda>)
    $targetElement = $xml->xpath('//lista_vivienda');

    if (!empty($targetElement)) {

        $newElement = $xml->addChild('vivienda');
        $newElement->addChild('tipo_vivienda', $tipo_vivienda);
        $newElement->addChild('zona', $zona);
        $newElement->addChild('direccion', $direccion);
        $newElement->addChild('num_dormitorios', $num_dormitorios);
        $newElement->addChild('precio', $precio);
        $newElement->addChild('tamanio', $tamanio);
        if(!empty($extras)){
            foreach ($extras as $extra) {
                $newElement->addChild('extra', $extra);
            }
        }else{
            $newElement->addChild('extras', $extras);
        }

        $newElement->addChild('foto', $foto);
        $newElement->addChild('observaciones', $observaciones);
        $newElement->addChild('ganancias', $ganancia);


        $xml->asXML($xmlFilePath);
    }
}


//Función que crea un XML y que sube los datos, en este caso viviendas.xml

function crear_xml($tipo_vivienda,$zona,$direccion,$num_dormitorios,$precio,$tamanio,$foto, $extras,$observaciones,$ganancia){
    // Create a new XML document
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    // Create the root element
    $lista_vivienda = $xml->createElement('lista_vivienda');
    $xml->appendChild($lista_vivienda);


    // Create the root element
    $vivienda = $xml->createElement('vivienda');
    $lista_vivienda->appendChild($vivienda);

    // Create child elements
    $tipo_vivienda_element = $xml->createElement('tipo_vivienda', $tipo_vivienda);
    $vivienda->appendChild($tipo_vivienda_element);

    $zona_element = $xml->createElement('zona', $zona);
    $vivienda->appendChild($zona_element);

    $direccion_element = $xml->createElement('direccion', $direccion);
    $vivienda->appendChild($direccion_element);

    $num_dormitorios_element = $xml->createElement('num_dormitorios', $num_dormitorios);
    $vivienda->appendChild($num_dormitorios_element);

    $precio_element = $xml->createElement('precio', $precio);
    $vivienda->appendChild($precio_element);

    $tamanio_element = $xml->createElement('tamanio', $tamanio);
    $vivienda->appendChild($tamanio_element);

    if(!empty($extras)){
        foreach ($extras as $extra) {
            $extra_element = $xml->createElement('extra', $extra);
            $vivienda->appendChild($extra_element);
        }
    }else{
        $extra_element = $xml->createElement('extras', $extras);
        $vivienda->appendChild($extra_element);
    }


    $foto_element = $xml->createElement('foto', $foto);
    $vivienda->appendChild($foto_element);

    $observaciones_element = $xml->createElement('observaciones', $observaciones);
    $vivienda->appendChild($observaciones_element);

    $ganacias_element = $xml->createElement('ganacias', $ganancia);
    $vivienda->appendChild($ganacias_element);


    // Save the XML to a file
    $xml->save('viviendas.xml');
}

//Funcion para dar formato a un XML
function formatoXML($xml){
    $dom = new DOMDocument("1.0","UTF-8");
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    return $dom->saveXML();
    }