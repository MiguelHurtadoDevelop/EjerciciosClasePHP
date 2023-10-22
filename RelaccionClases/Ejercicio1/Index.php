<?php
    require_once ("Ejercicio1.php");

    $coche1 = new Coche;

    echo"<h1>Datos del coche</h1>";
    echo"<ul>";
    echo"<li>Marca: ".$coche1->getMarca()."</li>";
    echo"<li>Modelo: ".$coche1->getModelo()."</li>";
    echo"<li>Color: ".$coche1->getColor()."</li>";
    echo"<li>Caballos: ".$coche1->getCaballos()."</li>";
    echo"<li>Velocidad: ".$coche1->getVelocidad()."</li>";
    echo"<li>Plazas: ".$coche1->getPlazas()."</li>";
    echo"</ul>";

    echo"<h1>Cambiamos el color al coche</h1>";
    $coche1->setColor("Amarillo");
    echo"El nuevo color de mi coche es: ".$coche1->getColor();

    echo"<h1>Mi coche va a acelerar 4 veces y frenar 1</h1>";
    $coche1->acelerar();
    $coche1->acelerar();
    $coche1->acelerar();
    $coche1->acelerar();
    $coche1->frenar();
    echo"Mi velocidad ahora es: ". $coche1->getVelocidad();


    $coche2 = new Coche;
    $coche2->color = 'verde';
    $coche2->modelo = 'Gallardo';

    echo"<h1>Datos del nuevo coche</h1>";
    echo"<ul>";
    echo"<li>Marca: ".$coche2->getMarca()."</li>";
    echo"<li>Modelo: ".$coche2->getModelo()."</li>";
    echo"<li>Color: ".$coche2->getColor()."</li>";
    echo"<li>Caballos: ".$coche2->getCaballos()."</li>";
    echo"<li>Velocidad: ".$coche2->getVelocidad()."</li>";
    echo"<li>Plazas: ".$coche2->getPlazas()."</li>";
    echo"</ul>";