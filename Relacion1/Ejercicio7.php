<?php
    
    


    for ($i = 1; $i <= 9; $i += 2) {

        for($j = 0; $j < 9 ; $j++ ){
            

            if (($j < (9-$j /2))||($j > (9-$j /2))){
                echo "&nbsp;";
            }else{
                echo "*";
            }


        }
        
        echo "<br>";
    }