<?php

require_once 'autoload.php';
require_once 'Config/config.php';
require_once 'Views/layout/header.php';

use src\controllers\FrontController;

FrontController::main();
require_once 'Views/layout/footer.php';
?>




