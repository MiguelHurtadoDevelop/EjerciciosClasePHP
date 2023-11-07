<?php
session_start();
echo "Bienvenido ". $_SESSION['Usuario']."<br><br>";

echo "<a href='logout.php'>Log Out</a>";