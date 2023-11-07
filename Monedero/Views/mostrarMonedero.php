<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos de Vivienda</title>

</head>
<body>
<h1>Monedero</h1>

    <table>
        <tr>
            <td>Concepto</td>
            <td>Fecha</td>
            <td>Importe</td>
        </tr>

        <?php
        $cont=0;
        $total=0;
        foreach ($monedero as $indice => $registro) { $cont++ ?>
            <tr>

                <td>

                    <?php if (isset($_GET['editConcepto']) && $_GET['editConcepto'] === $registro['Concepto']) { ?>

                        <input type="text" name="nuevoConcepto" value="<?php echo $registro['Concepto']; ?>">
                    <?php } else { ?>
                        <?php echo $registro['Concepto']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($_GET['editConcepto']) && $_GET['editConcepto'] === $registro['Concepto']) { ?>
                        <input type="date" name="nuevaFecha" value="<?php echo $registro['Fecha']; ?>">
                    <?php } else { ?>
                        <?php echo $registro['Fecha']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($_GET['editConcepto']) && $_GET['editConcepto'] === $registro['Concepto']) { ?>
                        <input type="number" name="nuevoImporte" value="<?php echo $registro['Importe']; ?>">
                    <?php } else { ?>
                        <?php echo $registro['Importe']; ?>
                    <?php } ?>
                </td>
                <td>
                    <?php if (isset($_GET['editConcepto']) && $_GET['editConcepto'] === $registro['Concepto']) { ?>
                        <a href="?controller=Monedero&action=guardarEdicion&concepto=<?php echo $registro['Concepto'];?>&nuevaFecha=<?php ?>&nuevoImporte=nuevoImporte">Guardar</a>

                    <?php } else { ?>
                        <a href="?controller=Monedero&action=mostrarMonedero&editConcepto=<?php echo $registro['Concepto']; ?>">Editar</a>
                    <?php } ?>
                </td>

                <td><a href="?controller=Monedero&action=borrarRegistro&concepto=<?php echo $registro['Concepto']; ?>">Borrar</a></td>

            </tr>
        <?php } ?>
        <tr>
            <form method="post" action="">
                <td><input type="text" name="concepto" id="Concepto" value=""></td>
                <td><input type="date" name="fecha" id="fecha" value=""></td>
                <td><input type="number" name="cantidad" id="cantidad" value=""></td>
                <td><button type="submit">Añadir</button></td>
            </form>
        </tr>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Location: http://localhost/EjerciciosClasePHP/Monedero/?controller=Monedero&action=añadirRegistro&concepto=" . $_POST['concepto'] . "&fecha=" . $_POST['fecha']. "&cantidad=" . $_POST['cantidad']);
        }
        ?>
    </table>

    <?php
        echo"Cantidad de registros: " . $cont;
        echo"<br>El total es: " . $total;
    ?>
</body>
</html>

