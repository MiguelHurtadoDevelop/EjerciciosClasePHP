<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
}
</style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th></th>
            <th>Columna 1</th>
            <th>Columna 2</th>
            <th>Columna 3</th>
            <th>Columna 4</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            $array = array(
                array(array("espadas_11"), array("oros_5"), array("copas_6"), array("oros_10")),
                array(array("espadas_2"), array("oros_7"), array("oros_12"), array("espadas_6")),
                array(array("bastos_6"), array("copas_8"), array("oros_1"), array("copas_7"))
            );

            for ($i = 0; $i < count($array); $i++) {
                echo "<tr>";
                echo "<td>Fila " . ($i + 1) . "</td>";
                for ($j = 0; $j < count($array[$i]); $j++) {
                    echo "<td>" . $array[$i][$j][0] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        
    </tbody>
</table>

</body>
</html>