<?php

    //Función que crea una baraja con cartas del 1-12 pasandole como parametro los palos que quieras asignarle a la baraja
    function crearBaraja($palos){

        $baraja = [];

        foreach($palos as $palo){
            for($i = 1; $i <= 12 ; $i++){
                $carta = $palo ."_". $i;
                $baraja[]= $carta;
            }
        }
        shuffle($baraja);
        return $baraja;
    }

    //Función que reparte cartas de una baraja que se la pase por parametro
    function repartirCartas(&$baraja) {


        $mano = array_pop($baraja);

        return $mano;
    }

    // Función que cuenta los puntos de una mano que se le pase por parametro según la pintuación de la brisca
    function contarPuntos($mano) {
        $puntos = 0;
        $puntosCartas = array(
            "1" => 11,
            "3" => 10,
            "12" => 4,
            "11" => 3,
            "10" => 2
        );

        foreach ($mano as $carta) {
            $numeroCarta = explode("_", $carta)[1];

            if (isset($puntosCartas[$numeroCarta])) {
                $puntos += $puntosCartas[$numeroCarta];
            }
        }

        return $puntos;
    }

    // Función que reparte 3 cartas a un determinado numero de jugadores que le pases por parametro de una
    // determinada baraja
    function RepartirCartasJugadores($baraja, $numjugadores)
    {
        $jugadores = array();

        for ($i = 0; $i < $numjugadores; $i++) {
            $jugadores[$i] = array();
        }

        for ($j = 0; $j < $numjugadores * 3;) {

            for ($k = 0; $k < $numjugadores; $k++) {

                $jugadores[$k][$j] = repartirCartas($baraja);
                $j++;

            }
        }
        return $jugadores;
    }