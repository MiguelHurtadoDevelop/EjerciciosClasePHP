

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos de Vivienda</title>

</head>
<body>

   <?php
require_once ('autoload.php');

use Controllers\BarajaController;

 $controlador = new BarajaController();
 $controlador->mostrarBaraja();

?>
</body>
</html>
