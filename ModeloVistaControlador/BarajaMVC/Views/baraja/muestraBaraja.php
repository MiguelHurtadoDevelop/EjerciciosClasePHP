

    <?php
    if(!is_dir('./imagenes')){
        echo "no  tenemos imagenes";
    }else{

        $barajaes = $baraja->getBaraja();
        var_dump($barajaes);
        foreach ($barajaes as $carta){
            echo "holas";
            $image = "./imagenes/".$carta->getPalo()."_".$carta->getNumero().".jpg";
            if(file_exists($image)){
                echo"<img src'$image'/>";

                }
            else{
                echo "No se ha encontrado esta carta";
            }
        }
    }
    ?>
