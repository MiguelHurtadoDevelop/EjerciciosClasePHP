<?php
    session_start();
    echo"Adios,".$_SESSION['Usuario'];

header("Refresh:2; url=principal.php");

