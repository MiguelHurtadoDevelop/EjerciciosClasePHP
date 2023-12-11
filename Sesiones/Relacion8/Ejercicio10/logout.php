<?php
    session_start();
    echo"Adios,".$_SESSION['User'];

header("Refresh:2; url=principal.php");

