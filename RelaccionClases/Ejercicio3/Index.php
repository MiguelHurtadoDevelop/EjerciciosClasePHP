<?php

require_once ("Animales/Perro.php");
try {
    $labrador = new Perro(12, 'Labrador', 'Amarillo', 'Rex');
    $labrador->mostrar_propiedades();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// Crear un segundo objeto llamado "caniche"
$caniche = new Perro(10, 'Caniche', 'Blanco', 'Buddy');

// Ejemplo de modificación del nombre del perro con control de errores
$perro_error_message = $labrador->setNombre('Luna');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
?>