<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de base y altura desde el formulario usando $_REQUEST
    $base = $_REQUEST["base"];
    $altura = $_REQUEST["altura"];

    // Calcular el área del triángulo
    $area = 0.5 * $base * $altura;

    // Mostrar el resultado
    echo "<h3>Área del triángulo:</h3>";
    echo "El área del triángulo con base $base y altura $altura es: $area";
}
?>