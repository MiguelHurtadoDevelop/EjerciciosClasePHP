<?php

    $radio = 5;
    
    $longitud = 2 * pi() * $radio;
    $superficie =  4 * pi()*$radio ** 2;
    $volumen = 4/3*pi()* $radio**3;
    
    echo  '<h3>Con round</h3>';
    echo 'la longitud es '. round($longitud, 2). '<br>';
    echo 'el volumen es '. round($volumen, 2). '<br>';
    echo 'la superficie es '. round($superficie, 2). '<br>';
    
    echo  '<h3>Con printf</h3>';
    printf("La longitud es: %1\$.2f", $longitud);
    echo  '<br>';
    printf("el volumen es: %1\$.2f", $volumen);
    echo  '<br>';
    printf("la superficie es: %1\$.2f", $superficie);
    
    
    
    
    
    
    

?>

