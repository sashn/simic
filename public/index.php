<?php
require_once __DIR__."/../app/configs/configure.php";

require_once HELPER_DIR."common_functions.php";
require_once CLASS_DIR."SymfonyLoader.php";

$autoloader = new SymfonyLoader;
$autoloader->register();
$autoloader->addPrefix(null, array(CONTROLLER_DIR, INTERFACE_DIR, MODEL_DIR, HELPER_DIR, CLASS_DIR));

$frontController = new FrontController();
$frontController->run();

