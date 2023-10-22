<?php
    $array =[1,2,3,4,5,6,7,8];

    foreach ($array as $valor){
     echo $valor;
}


echo "<br>";
    arsort($array);

foreach ($array as $valor){
    echo $valor;
}
echo "<br>";
echo count($array);

echo "<br>";
echo array_search(3,$array);

function mosstrarArray($array,$indice){

    return $array[$indice];


}

$indice = array_search(3,$array);


echo mosstrarArray($array,$indice);