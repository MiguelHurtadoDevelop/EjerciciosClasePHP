<?php

    //Incluimos el archivo Utilidades que contiene todas las funciones del programa
    include ("Utilidades.php");

    //inicializamos los palos que vamos a utilizar en el programa
    $palos = ["bastos", "oros", "copas", "espadas"];

    //Creamos la baraja con la función crarBaraja()
    $baraja = crearBaraja($palos);

    //Apartado: A
    //Variable de la mano del jugador
    $mano1 = [];

    //En la variable mano asignamos las cartas correspondientes con la función rpartirCartas()
    for($i = 0 ;$i<3;$i++){
        $mano1[$i]=repartirCartas($baraja);
    }

    //Utilizando un foreach imprimimos las cartas por pantalla

    echo "<h1>Apartado: A</h1>";
    echo "<h2>Cartas repartidas al jugador:</h2>";
    foreach ($mano1 as $carta) {
        echo "<img src='imagenes/".$carta.".jpg'>";
    }


    //Apartado: B
    //Variable de la mano del jugador
    $mano2 = [];

    //En la variable mano asignamos las cartas correspondientes con la función repartirCartas()
    for($i = 0 ;$i<10;$i++){
        $mano2[$i]=repartirCartas($baraja);
    }

    //Contamos los puntos de la $mano2 mediante la función contarPuntos()
    $puntos = contarPuntos($mano2);

    echo "<h1>Apartado: B</h1>";
    echo "<h2>Cartas del jugador al terminar:</h2>";

    //Utilizando un foreach imprimimos las cartas por pantalla
    foreach ($mano2 as $carta) {
        echo "<img src='imagenes/".$carta.".jpg'>";
    }

    //Imprimimos los puntos por pantalla
    echo "<br>";
    echo "<h3>$puntos Puntos</h3>";;



    //Utilizando un foreach imprimimos las cartas restantes de la baraja

    echo "<h1>Baraja Restante:</h1>";
    foreach ($baraja as $carta) {
        echo "<img src='imagenes/".$carta.".jpg'>";
    }


    //Apartado: C
    echo "<h1>Apartado: C</h1>";

    //Formulario para pedirle al usuario cuantos jugadores van a jugar
    echo '
      <form action="apartadoC.php" method="post" target="_blank">
        <label for="numJugadores">Numero de jugadores:</label>
        <input type="text" id="numJugadores" name="numJugadores"><br><br>
        <input type="submit" value="Enviar">
      </form>
    ';


