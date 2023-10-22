<?php
//incluimos Funciones.php
include('Funciones.php');

//Comprobamos que nos lleguen las variables por post
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Saneamos todas las variables que nos llegan por post.
    $_POST['tipo_vivienda'] = filter_var($_POST['tipo_vivienda'],FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['zona'] = filter_var($_POST['zona'],FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['direccion'] = filter_var($_POST['direccion'],FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['precio'] = filter_var($_POST['precio'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $_POST['tamanio'] = filter_var($_POST['tamanio'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    if(isset($_POST['extras'])){
        foreach ($_POST['extras'] as $extra){
            $extra = filter_var($extra,FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
    $_POST['observaciones'] = filter_var($_POST['observaciones'],FILTER_SANITIZE_SPECIAL_CHARS);

    //Array para guardas los errores de validacion
    $errores = array();

    //Validamos todas las variables que nos llegan por POST y si no valida, Los errores se guardan en el array errores
    if(!isset($_POST['tipo_vivienda']) || !validar_tipo_vivienda($_POST['tipo_vivienda'])){
        $errores['tipo_vivienda'] = "El tipo de vivienda no es valido";
    }else{
        $tipo_vivienda = $_POST['tipo_vivienda'];
    }

    if(!isset($_POST['zona']) || !validar_zona($_POST['zona'])){
        $errores['zona'] = "El tipo de zona no es valida";
    }else{
        $zona = $_POST['zona'];
    }

    if(!isset($_POST['direccion']) || !validar_direccion($_POST['direccion'])){
        $errores['direccion'] = "La dirección no es valida";
    }else{
        $direccion = $_POST['direccion'];
    }

    if(!isset($_POST['num_dormitorios']) || !validar_num_dormitorios($_POST['num_dormitorios'])){
        $errores['num_dormitorios'] = "El numero de dormitorios no es valido";
    }else{
        $num_dormitorios = $_POST['num_dormitorios'];
    }

    if(!isset($_POST['precio']) || !validar_precio($_POST['precio'])){
        $errores['precio'] = "El precio no es valido";
    }else{
        $precio = $_POST['precio'];
    }

    if(!isset($_POST['tamanio']) || !validar_metros_cuadrados($_POST['tamanio'])){
        $errores['tamanio'] = "El tamaño no es valido";
    }else{
        $tamanio = $_POST['tamanio'];
    }

    if(!empty($_POST['extras'])){
        if(!validar_extras($_POST['extras'])){
            $errores['extras'] = "Los extras no son validas";
        }else{

            $extras=array();

            $extras = $_POST['extras'];
        }
    }else{
        $extras ='';
    }

    if(!isset($_FILES['foto']) || !validar_foto($_FILES['foto'])){
        $errores['foto'] = "La foto no es valida";
    }else{
        subir_foto($_FILES['foto']);
        $foto = $_FILES['foto']['name'];
    }

    if(!empty($_POST['observaciones'])){
        if (!validar_observaciones($_POST['observaciones'])) {

            $errores['observaciones'] = "Las observaciones no son validas";

        } else {

            $observaciones = $_POST['observaciones'];
        }
    }else{
        $observaciones = "";
    }



    //Si todo se valida y el array erroes esta vacío
    if (empty($errores))
    {
        //Calculamos la ganancia con la función calcular_ganancia
        $ganancia = calcular_ganancia($zona,$tamanio, $precio);

        //Subimos todos los datos a un archivo XML

        //si existe el archivo
        if(file_exists("viviendas.xml")){

            //llamamos a la función subirXML que sube los datos al XML existente
            subirXML($tipo_vivienda,$zona,$direccion,$num_dormitorios,$precio,$tamanio,$foto, $extras,$observaciones,$ganancia);


        //si no existe
        } else {
            //lamamamos a la función crear_xml que crea el archivo y sube los datos
           crear_xml($tipo_vivienda,$zona,$direccion,$num_dormitorios,$precio,$tamanio,$foto, $extras,$observaciones,$ganancia);

        }
        //Damos formato al XML
        $xmlstr = file_get_contents('viviendas.xml');
        $viviendas = new SimpleXMLElement($xmlstr);
        file_put_contents('viviendas.xml', formatoXML($viviendas));

        //Abrimos Inmobiliaria.php para mostrar los datos
        header("Location:Inmobiliaria.php");


    }
}
?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario de Datos de Vivienda</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
<body>

+
<h1>Insercion de viviendas de Datos de Vivienda</h1>

<div class="marco">
    <form action="" method="post" enctype="multipart/form-data">

        <label for="tipo_vivienda">Tipo de vivienda:</label>
        <select id="tipo_vivienda" name="tipo_vivienda">
            <option selected hidden="hidden" value="<?php if(isset($_POST['tipo_vivienda'] ))echo $_POST['tipo_vivienda'] ;?>"><?php if(isset($_POST['tipo_vivienda'] ))echo $_POST['tipo_vivienda'] ;?></option>
            <option value="Piso">Piso</option>
            <option value="Adosado">Adosado</option>
            <option value="Chalet">Chalet</option>
            <option value="Casa">Casa</option>
        </select><br>

        <?php
        if(isset($errores['tipo_vivienda'])){
            echo "<span>$errores[tipo_vivienda]</span>";
        }
        ?>
        <br><br>
        <label for="zona">Zona:</label>
        <select id="zona" name="zona">
            <option selected hidden="hidden" value="<?php if(isset($_POST['zona'] ))echo $_POST['zona'] ;?>"><?php if(isset($_POST['zona'] ))echo $_POST['zona'] ;?></option>
            <option value="Centro">Centro</option>
            <option value="Zaidín">Zaidín</option>
            <option value="Chana">Chana</option>
            <option value="Albaicín">Albaicín</option>
            <option value="Sacromonte">Sacromonte</option>
            <option value="Realejo">Realejo</option>
        </select><br>
        <?php
        if(isset($errores['zona'])){
            echo "<span>$errores[zona]</span>";
        }
        ?>
        <br><br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" value="<?php if(isset($_POST['direccion']))echo $_POST['direccion']?>" name="direccion">
        <?php
            if(isset($errores['direccion'])){
                echo "<span>$errores[direccion]</span>";
            }
        ?>
        <br><br>

        <label for="num_dormitorios">Número de dormitorios:</label>
        <label><input type="radio" name="num_dormitorios" value="1" <?php if(isset($_POST['num_dormitorios'])){ if($_POST['num_dormitorios']==1)echo 'checked';}?>> 1</label>
        <label><input type="radio" name="num_dormitorios" value="2" <?php if(isset($_POST['num_dormitorios'])){if($_POST['num_dormitorios']==2) echo 'checked';}?>> 2</label>
        <label><input type="radio" name="num_dormitorios" value="3" <?php if(isset($_POST['num_dormitorios'])){if($_POST['num_dormitorios']==3) echo 'checked';}?>> 3</label>
        <label><input type="radio" name="num_dormitorios" value="4" <?php if(isset($_POST['num_dormitorios'])){if($_POST['num_dormitorios']==4) echo 'checked';}?>> 4</label>
        <label><input type="radio" name="num_dormitorios" value="5" <?php if(isset($_POST['num_dormitorios'])){if($_POST['num_dormitorios']==5) echo 'checked';}?>> 5</label>
        <?php
        if(isset($errores['num_dormitorios'])){
            echo "<span>$errores[num_dormitorios]</span>";
        }
        ?>
        <br><br>

        <label for="precio">Precio:</label>
        <input value="<?php if(isset($_POST['precio']))echo $_POST['precio']?>" type="text" id="precio" name="precio" min="0">

        <?php
            if(isset($errores['precio'])){
                echo "<span>$errores[precio]</span>";
            }
        ?>
        <br><br>

        <label for="tamanio">Tamaño en metros cuadrados:</label>
        <input value="<?php if(isset($_POST['tamanio']))echo $_POST['tamanio']?>" type="text" id="tamanio" name="tamanio" min="0">
        <?php
            if(isset($errores['tamanio'])){
                echo "<span>$errores[tamanio]</span>";
            }
        ?>
        <br><br>

        <label>Extras:</label><br>
        <input type="checkbox" id="piscina" name="extras[]" value="Piscina" <?php if(isset($_POST['extras']) && in_array('Piscina', $_POST['extras'])) echo ' checked'; ?>>
        <label for="piscina">Piscina</label><br>

        <input type="checkbox" id="jardin" name="extras[]" value="Jardín" <?php if(isset($_POST['extras']) && in_array('Jardín', $_POST['extras'])) echo ' checked'; ?>>
        <label for="jardin">Jardín</label><br>

        <input type="checkbox" id="garaje" name="extras[]" value="Garaje" <?php if(isset($_POST['extras']) && in_array('Garaje', $_POST['extras'])) echo ' checked'; ?>>
        <label for="garaje">Garaje</label><br><br>
        <?php
        if(isset($errores['extras'])){
            echo "<span>$errores[extras]</span>";
        }
        ?>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" ><br><br>
        <?php
        if(isset($errores['foto'])){
            echo "<span>$errores[foto]</span>";
        }
        ?>
        <br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea  id="observaciones" name="observaciones" rows="4" cols="50"><?php if(isset($_POST['observaciones'])){echo $_POST['observaciones'];}?></textarea><br>
        <?php
        if(isset($errores['observaciones'])){
            echo "<span>$errores[observaciones]</span>";
        }
        ?><br><br>
        <input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>
