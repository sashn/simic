<?php
require_once __DIR__."/../app/config/configure.php";

require_once HELPER_DIR."common_functions.php";
require_once HELPER_DIR."db_queries.php";
require_once HELPER_DIR."SymfonyLoader.php";

openDBConnection();

$autoloader = new SymfonyLoader;
$autoloader->register();
$autoloader->addPrefix(null, array(CONTROLLER_DIR, INTERFACE_DIR, MODEL_DIR, HELPER_DIR));

$frontController = new FrontController();
$frontController->run();

closeDBConnection();

