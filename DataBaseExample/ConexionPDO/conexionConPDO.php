<?php
    $servername = "localhost"; // Nombre/IP del servidor
    $database = "empresa"; // Nombre de la BBDD
    $username = "root"; // Nombre del usuario
    $password = ""; // Contraseña del usuario
    try {
        // Creamos la conexión
         // Para que la conexión a mysql utilice collation UTF-8 añadimos
         //charset=utf8mb4 al string de la conexión.
        $conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4",
        $username, $password);
        //Para que genere excepciones a la hora de reportar errores.
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        try{
            $preparada = $conexion->prepare("SELECT nombre from usuarios where rol = :rol");
            $preparada->bindParam('rol' ,$rol);
            $rol = 2;
            $preparada->execute();



            foreach($data = $preparada->fetchAll(PDO::FETCH_OBJ) as $row){
                echo"<p>Nombre: ".$row->nombre."<p/>";
            }


        }catch (PDOException $e) {

            echo "Error al hacer la consulta: " . $e->getMessage();
        }

        echo "<h2>Conexión realizada con éxito</h2>";

    } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }

        $preparada=null;
    $conexion = null;


?>