<?php
ini_set('display_errors', 1);

require_once('Autoload.php');
require_once('config.php');

use App\Framework\Router;

Autoload::run();

$router = new Router();
$router->exec();