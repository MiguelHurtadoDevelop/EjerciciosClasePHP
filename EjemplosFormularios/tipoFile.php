<?php
    if($_FILES["foto"] ["type"]!="image/jpeg"){
        echo "ERROR: el archibo debe ser jpeg";

    }else if($_FILES["foto"]["size"] > 512000){
        echo "ERROR: el archibo debe exceder de 500KB";

    }else{
        if(!is_dir('img1')){
            mkdir('img1',0777);
        }
        if(is_uploaded_file($_FILES["foto"]["tmp_name"])){
            $nombreDirectorio = "img1/";
            $nombreFichero = $_FILES["foto"]["name"];

            $nombreCompleto = $nombreDirectorio.$nombreFichero;
            if(is_file($nombreCompleto)){
                $idUnico = time();
                $nombreFichero = $idUnico."-". $nombreFichero;
            }
            $res= move_uploaded_file($_FILES["foto"]["tmp_name"], $nombreDirectorio.$nombreFichero);
            if($res){
                echo"<br><h1>Imagen subida correctamente</h1>";
            }else{
                echo"<br>Error";
            }
        }
        else{
            echo"No se ha podidio subir el fichero";
        }
    }
    ?>