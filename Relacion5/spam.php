<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de base y altura desde el formulario usando $_REQUEST
    $nombre = $_REQUEST["nombre"];
    $telefono = $_REQUEST["telefono"];
    $email = $_REQUEST["email"];

    echo"¡Buenos días, $nombre! <br>

    Te voy a enviar spam a $email y te llamaré de madrugada a $telefono.<br>

    Enviado desde un iPhone";

}
?>