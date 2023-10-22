<?php

    //Incluimos el archivo Utilidades que contiene todas las funciones del programa
    include("Utilidades.php");

    //Apartado: C
    echo "<h1>Apartado: C</h1>";


    //Asignamos a la variable $numjugadores el numero que nos llega a traves del formulario
    $numjugadores  = $_REQUEST['numJugadores'];

    //Comprobamos que el numero de jugadores no este entre 2 y 6
    if ($numjugadores < 2 || $numjugadores > 6) {

        //si la afirmación es verdadera volvemos a lanzar el formulario

        echo '
          <form action="apartadoC.php" method="post" >
            <label for="numJugadores">Numero de jugadores:</label>
            <input type="text" id="numJugadores" name="numJugadores"><br><br>
            <input type="submit" value="Enviar">
          </form>
        ';
    } else {

        //sila afirmación es falsa
        //Imprimimos el numero de jugadores

        echo "<h3>Número de jugadores: $numjugadores</h3>"  ;

        //Asignamos los palos que queremos utilizar
        $palos = ["bastos", "oros", "copas", "espadas"];


        //Creamos la baraja con la función crarBaraja()
        $baraja = crearBaraja($palos);


        //Imprimimos la baraja completa

        echo "<h1>Baraja completa:</h1>";

        foreach ($baraja as $carta) {
            echo "<img src='imagenes/".$carta.".jpg'>";
        }


        //A la variable jugadores el asignamos los jugadores con sus respectivas manos mediante
        //la función RepartircartasJugadores
        $jugadores= RepartirCartasJugadores($baraja, $numjugadores);

        //imprimimos las manos de cada jugador

        foreach($jugadores as $indice => $jugador) {
            echo "<h1>Cartas del jugador " . ($indice + 1) . "</h1>";

            foreach($jugador as $carta) {
                echo "<img src='imagenes/" . $carta . ".jpg'>";
            }
        }
    }

