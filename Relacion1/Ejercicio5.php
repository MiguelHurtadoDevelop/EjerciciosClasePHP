<?php

$fechahoy = date('d-m-Y');
$sumafecha = strtotime("+1 day");
$restafecha = strtotime("-1 day");
$fechaMañana = date('d-m-Y', $sumafecha) ;
$fechaAyer = date('d-m-Y', $restafecha) ;


echo " hoy es: $fechahoy <br>";
echo "Mañana es:  $fechaMañana <br>";
echo "Ayer era:  $fechaAyer";