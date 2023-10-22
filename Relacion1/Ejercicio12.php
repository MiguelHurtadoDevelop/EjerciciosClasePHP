<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

<?php
    $cara1 = rand(1,6);
    echo $cara1;
    echo  "<img src=imagenes/$cara1.png height=50px width=50px>";
    $cara2 = rand(1,6);
    echo $cara2;
    echo  "<img src=imagenes/$cara2.png height=50px width=50px><br>";

    if($cara1 == $cara2){
        echo "han salido pareja";

    }else if($cara1> $cara2){
        echo "$cara1 > $cara2";
    }else if($cara1 < $cara2){
        echo "$cara1 < $cara2";
    }
    

?>

</body>
</html>