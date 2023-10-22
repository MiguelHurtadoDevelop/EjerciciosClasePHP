<?php

echo"Nombre:";
$nombre = $_REQUEST['nombre'];
print ($nombre);

echo"<br>";
echo"Apellidos:";
$apellidos = $_REQUEST['apellidos'];
print ($apellidos);

echo"<br>";
echo"Fecha de nacimiento:";
$fecha = $_REQUEST['fecha'];
print ($fecha);

echo"<br>";
echo"Correo electronico:";
$fecha = $_REQUEST['correo'];
print ($fecha);


echo"<br>";
echo"Lenguajes que conoces:";
$lenguajes = $_REQUEST['lenguajes'];
foreach ($lenguajes as $lenguaje){
    print(" $lenguaje,");
}

echo"<br>";
echo"Comentarios:";
$comentarios = $_REQUEST['Comentarios'];
print ($comentarios);
