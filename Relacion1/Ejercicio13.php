<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Tablas de multiplicar</th>

    </tr>
    <?php


    for( $j = 0;$j<=10;$j++){
        echo"<tr><th>La tabla del $j</th>";
        for($i = 0; $i <= 10;$i++){


                    $multiplicacion = $i * $j;
                    echo"<td>$j  X  $i   = $multiplicacion </td>";
        }
        echo "</tr>";
}
    
    ?>
</table>

</body>
</html>



