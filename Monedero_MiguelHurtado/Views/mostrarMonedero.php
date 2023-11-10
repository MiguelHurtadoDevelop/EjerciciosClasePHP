<?php
//Comprobamos que existe algun metodo POST
if($_SERVER['REQUEST_METHOD'] == 'POST') {

//Coprobaremos que accion nos ha llegado por post

    //Si nos llega añadir
    if(isset($_POST['añadir'])) {

        //Creamos el array de los errores de añadir
        $erroresAnadir = array();

        //Sanemaos las variables de añadir
        $_POST['concepto'] = filter_var($_POST['concepto'],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['cantidad'] = filter_var($_POST['cantidad'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);

        //Validamos las variables de añadir
        if (!isset($_POST['concepto']) || !\Validacion\classValidate::validarConcepto($_POST['concepto'])) {
            $erroresAnadir['concepto'] = "El concepto no es valido";
        }
        if (!isset($_POST['fecha']) || !\Validacion\classValidate::validarFecha($_POST['fecha'])) {
            $erroresAnadir['fecha'] = "La fecha no es valida";
        }
        if (!isset($_POST['cantidad']) || !\Validacion\classValidate::validarImporte($_POST['cantidad'])) {
            $erroresAnadir['importe'] = "El importe no es valido";
        }


        //Si no existen errores llamamos al metodo añadirRegistro y le pasamos los datos
        if (empty($erroresAnadir)) {
            header("Location: " . URL_DEFAULT . "?controller=Monedero&action=añadirRegistro&concepto=" . $_POST['concepto'] . "&fecha=" . $_POST['fecha'] . "&cantidad=" . $_POST['cantidad']);
        }
    }
    //Si nos llega editar
    if(isset($_POST['editar'])) {

        //Creamos el array de los errores de editar
        $erroresEditar = array();

        //Sanemaos las variables de editar
        $_POST['concepto'] = filter_var($_POST['concepto'],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['cantidad'] = filter_var($_POST['cantidad'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);

        //Validamos las variables de editar
        if (!isset($_POST['concepto']) || !\Validacion\classValidate::validarConcepto($_POST['concepto'])) {
            $erroresEditar['conceptoEditado'] = "El concepto no es valido";
        }
        if (!isset($_POST['fecha']) || !\Validacion\classValidate::validarFecha($_POST['fecha'])) {
            $erroresEditar['fechaEditada'] = "La fecha no es valida";
        }
        if (!isset($_POST['cantidad']) || !\Validacion\classValidate::validarImporte($_POST['cantidad'])) {
            $erroresEditar['importeEditado'] = "El importe no es valido";
        }

        //Si no existen errores llamamos al metodo editarRegistro y le pasamos los datos
        if (empty($erroresEditar)) {
            header("Location: " . URL_DEFAULT . "?controller=Monedero&action=editarRegistro&concepto=" . $_POST['concepto'] . "&fecha=" . $_POST['fecha'] . "&cantidad=" . $_POST['cantidad'] . "&indice=" . $_POST['indice']);
        }
    }

    //Si nos llega buscar
    if(isset($_POST['busqueda'])){

        //Creamos el array de los errores de busqueda
        $erroresBusqueda = array();

        //Sanemaos las variables de buscar
        $_POST['busqueda'] = filter_var($_POST['busqueda'],FILTER_SANITIZE_SPECIAL_CHARS);

        //Validamos las variables de buscar
        if (!\Validacion\classValidate::validarConcepto($_POST['busqueda'])) {
            $erroresBusqueda['busqueda'] = "La busqueda no es valida no es valido";
        }

        //Si no existen errores llamamos al metodo buscarRegistro y le pasamos el dato
        if (empty($erroresBusqueda)) {
            header("Location: ".URL_DEFAULT."?controller=Monedero&action=buscarRegistro&conceptoBuscar=". $_POST['busqueda']);
        }
    }

}
?>
<main>
    <!-Tabla que muestra todos los datos de los registros->
    <table>

        <!-Botones para ordenar->
        <tr>
            <th><a href="?controller=Monedero&action=ordernarPorConcepto"><button class="ordenar">Concepto</button></a></th>
            <th><a href="?controller=Monedero&action=ordernarPorFecha"><button class="ordenar">Fecha</button></a></th>
            <th><a href="?controller=Monedero&action=ordernarPorImporte"><button class="ordenar">Importe</button></th>
        </tr>


        <?php
        $cont = 0;
        $total = 0;

        //Recorremos tdos los registros de $monedero
        foreach ($monedero as $indice => $registro) {
            $cont ++;
            $total +=$registro['Importe']
        ?>
            <tr>
                    <!-Si existe un indice para editar, mostramos el foemulario de edicion->
                    <?php if (isset($_GET['indice']) && $_GET['indice'] == $indice) { ?>
                        <form method="post">
                            <input type="hidden" name="form" value="editar">
                            <td>
                                <input type="text" name="concepto" value="<?php echo $registro['Concepto']; ?>"><br>
                                <?php
                                if(isset($erroresEditar['conceptoEditado'])){
                                    echo "<span>$erroresEditar[conceptoEditado]</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <input type="text" name="fecha" value="<?php echo $registro['Fecha']; ?>"><br>
                                <?php
                                if(isset($erroresEditar['fechaEditada'])){
                                    echo "<span>$erroresEditar[fechaEditada]</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <input type="text" name="cantidad" value="<?php echo $registro['Importe']; ?>"><br>
                                <?php
                                if(isset($erroresEditar['importeEditado'])){
                                    echo "<span>$erroresEditar[importeEditado]</span>";
                                }
                                ?>
                                <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                            </td>
                            <td>
                                <button type="submit" name="editar" value="editar">Guardar cambios</button>
                            </td>
                        </form>
                    <?php } else { ?>
                        <!-Si no existe edicion, mostramos registro->
                        <td>
                            <?php echo $registro['Concepto']; ?>
                        </td>
                        <td>
                            <?php echo $registro['Fecha']; ?>
                        </td>
                        <td>
                            <?php echo $registro['Importe']; ?>
                        </td>
                        <td>
                            <a href="?controller=Monedero&action=mostrarMonedero&indice=<?php echo $indice; ?>"><button>Editar</button></a>
                            <a href="?controller=Monedero&action=borrarRegistro&indice=<?php echo $indice; ?>"><button>Borrar</button></a>
                        </td>

                    <?php } ?>
                <?php } ?>
                </tr>

        <tr>
            <!-Formulario para añadir un nuevo registro->

            <form method="post" action="">
                <input type="hidden" name="form" value="añadir">
                <td>
                    <input type="text"  placeholder="Concepto" value="<?php if(isset($_POST['concepto']))echo $_POST['concepto']?>" name="concepto" id="Concepto" ><br>
                    <?php
                    if(isset($erroresAnadir['concepto'])){
                        echo "<span>$erroresAnadir[concepto]</span>";
                    }
                    ?>
                </td>
                <td>
                    <input type="text" placeholder="Fecha (dd/mm/YYYY)" name="fecha" id="fecha" value="<?php if(isset($_POST['fecha']))echo $_POST['fecha']?>"><br>
                    <?php
                    if(isset($erroresAnadir['fecha'])){
                        echo "<span>$erroresAnadir[fecha]</span>";
                    }
                    ?>
                </td>
                <td>
                    <input type="text" placeholder="Importe" name="cantidad" id="cantidad" value="<?php if(isset($_POST['cantidad']))echo $_POST['cantidad']?>"><br>
                    <?php
                    if(isset($erroresAnadir['importe'])){
                        echo "<span>$erroresAnadir[importe]</span>";
                    }
                    ?>
                </td>

                <td><button type="submit" name="añadir" value="añadir">Añadir</button></td>
            </form>
        </tr>

    </table>
    <hr>

    <div id="buscador">

        <!-Formulario buscar un registro por concepto->

        <form method="post" action="">
            <input type="text"  value="<?php if(isset($_POST['busqueda']))echo $_POST['busqueda']?>" name="busqueda" placeholder="Buscar por Concepto..."><br>
            <?php
            if(isset($erroresBusqueda['busqueda'])){
                echo "<span>$erroresBusqueda[busqueda]</span>";
            }
            ?>
            <button type="submit">Buscar</button>
        </form>

        <a href="<?php echo URL_DEFAULT;?>"><button>Mostrar todos los registros</button></a>
        <hr>

        <!-Mostramos datos de los registros->
        <?php
            echo"Cantidad de registros: " . $cont;
            echo"<br>El balance del monedero es: " . $total." €";
        ?>
    </div>
</main>


