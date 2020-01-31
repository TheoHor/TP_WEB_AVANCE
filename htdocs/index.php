<?php

ini_set('display_errors',1);

require_once ('Autoload.php');
require_once('config.php');

autoload::run();

use App\Framework\Router;
$router = new Router();
$router->exec();