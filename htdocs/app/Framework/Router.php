<?php

namespace App\Framework;

class Router
{
    private $routes;
    private $class;
    private $method;

    public function __construct()
    {
        $this->routes = require(BASE_DIR . '/routes.php');
    }

    public function exec()
    {
        try {
            $this->prepare();
            call_user_func([new $this->class , $this->method]);

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    private function prepare()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_URI']])) {
            throw new \Exception('Error path');
        }

        $route = $this->routes[$_SERVER['REQUEST_URI']];
        $this->class = array_shift($route);
        $this->method = array_shift($route);
    }
}