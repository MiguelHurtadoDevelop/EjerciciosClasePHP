<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos de Vivienda</title>

</head>
<body>
    <?php

    if(!is_dir('./imagenes')){
        echo "no  tenemos imagenes";
    }else{



        foreach ($mazo as $carta){


            $image = "./imagenes/".$carta->getPalo()."_".$carta->getNumero().".jpg";

            if(file_exists($image)){
                echo"<img src='$image'/>";

            }
            else{
                echo "No se ha encontrado esta carta";
            }
        }
    }

    ?>
</body>
</html>



