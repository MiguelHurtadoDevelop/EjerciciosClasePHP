<?php
require 'vendor/autoload.php';
require_once 'autoload.php';
require_once 'Config/config.php';
require_once './Views/Layout/header.html';
use Controllers\FrontController;
FrontController::main();
require_once './Views/Layout/footer.html';
?>