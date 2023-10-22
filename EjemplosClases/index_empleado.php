<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <title>dasdasdas</title>

</head>
<body>
    <?php
        require_once ('empleado.php');
        $luis = new Empleado();
        $luis->setNombre("Luis José");
        $luis->setApellidos("Cuevas", "Sánchez");
    ?>

    <h1>Datos de: <?php $luis->getNombre()." ". $luis->getApellidos()?></h1>


</body>
</html>