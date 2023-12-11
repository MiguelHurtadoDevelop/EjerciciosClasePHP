<?php
session_start();
echo "Bienvenido ". $_SESSION['User']."<br><br>";

echo "<a href='logout.php'>Log Out</a>";