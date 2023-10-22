<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Número en inglés</th>
        <th>Número en español</th>
    </tr>
    <?php
    $numeros_ingles = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten");
    $numeros_espanol = array("Uno", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Ocho", "Nueve", "Diez");

    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        echo "<td>" . $numeros_ingles[$i] . "</td>";
        echo "<td>" . $numeros_espanol[$i] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>