<?php
namespace App\Framework;

class Router{

    private $routes;

    private $class;

    private $method;
    private $parameters = [];

    public function __construct(){
        $this->routes = require(BASE_DIR . '/routes.php');
    }

    public function exec(){
        try {
            $this->prepare();
            call_user_func([new $this->class, $this->method], $this->parameters);
        } catch (\Exception $e){
            $params = array($e->getMessage());
            call_user_func_array([new $this->class, $this->method], $params);
            die;
        }
    }

    private function prepare(){
        foreach ($this->routes as $key => $val){
            if(strpos($key, '#') === 0 && preg_match($key, $_SERVER["REQUEST_URI"])){
                $var = preg_split("#\/#", $_SERVER["REQUEST_URI"])[2];
                $route = $this->routes[$key];
                $this->class = array_shift($route);
                $this->method = array_shift($route);
                array_push($this->parameters, $var);
                return 0;
            }
        }
        if(!isset($this->routes[$_SERVER["REQUEST_URI"]])){
            $this->class = 'App\Controller\Error';
            $this->method = 'error';
            throw new \Exception('Error Path');
        } else {
            $route = $this->routes[$_SERVER["REQUEST_URI"]];
            $this->class = array_shift($route);
            $this->method = array_shift($route);
        }
    }
}