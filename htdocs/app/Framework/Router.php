<?php
namespace App\Framework;

class Router{
    /**
     * Tableau contenant les routes
     *
     * @var mixed
     */
    private $routes;
    /**
     * Classe à appeler
     *
     * @var
     */
    private $class;
    /**
     * Méthode à appeler dans la classe
     *
     * @var
     */
    private $method;

    /**
     * Router constructor.
     */
    public function __construct(){
        $this->routes = require(BASE_DIR . '/routes.php');
    }

    /**
     * Execute le rendu d'une page par rapport à l'URL
     */
    public function exec(){
        try {
            $this->prepare();
            call_user_func([new $this->class, $this->method]);
        } catch (\Exception $e){
            $params = array($e->getMessage());
            call_user_func_array([new $this->class, $this->method], $params);
            die;
        }
    }

    /**
     * Prépare le chargement de la page
     *
     * @throws \Exception
     */
    private function prepare(){
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