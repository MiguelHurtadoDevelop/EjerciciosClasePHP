<?php

    require_once 'autoload.php';

    use MisClases\Usuario;

    use PanelAdministrador\Usuario as UsuarioAdmin;

    $usujuegos = new Usuario();
    echo "<br><b>User del paquete MisClases: </b>";
    echo $usujuegos->getNombre();

    $usuAdmin = new UsuarioAdmin();
    echo "<br><b>User del paquete PanelAdministrador: </b>";
    echo $usuAdmin->getNombre();
    echo "<br><b>El name space es: </b>";
    echo $usuAdmin->informacion();


    echo'<br> Comprueba si existe la clase usuario 2';
    $clase = @class_exists('PanelAdministrador\Usiaruio2o');
    if($clase){
        echo"La clase SI existe";
    }else
        echo"La clase NO existe";


    use PanelAdministrador\Principal;
    $principal = new Principal();
    echo "<br>User del paquete principal: ";
    echo($principal->getUsuariop())->getNombre();