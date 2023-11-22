<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "tienda"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
try{
    // Creamos la conexión
    // Para que la conexión a mysql utilice collation UTF-8 añadimos
    //charset=utf8mb4 al string de la conexión.
    $conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4",
        $username, $password);
    //Para que genere excepciones a la hora de reportar errores.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

    }catch (PDOException $e) {

        echo "Error al hacer la consulta: " . $e->getMessage();
    }

    echo "<h2>Conexión realizada con éxito</h2>";

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();
}