<?php


namespace App\Core;

use Exception;


class Router 

{

    public $routes = [

        'GET' => [],

        'POST' => [],

        'DELETE' => []
    ];


    public function get($uri, $controller) 

    {
        $this->routes['GET'][$uri] = $controller;

    }

    
    public function post($uri, $controller) 

    {

        $this->routes['POST'][$uri] = $controller;

    }


    public function delete($uri, $controller) 

    {
        $uri = explode('/', $uri);
        $this->routes['DELETE'][$uri[0]] = $controller;

    }


    public static function load($file) 

    {

        $router = new static;

        require $file;

        return $router;

    }


    public function direct($uri, $requestType) 

    {
        
        if (($requestType === 'DELETE') || (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'delete')) {

            
            $ulrArray = explode('/', $uri);

            $routesExploded = explode('@', $this->routes['DELETE'][$ulrArray[0]]);

            return $this->callAction(
                $routesExploded[0],
                $routesExploded[1],
                $ulrArray[1]
            );
        }

        if (array_key_exists($uri, $this->routes[$requestType])) {
            
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );

        }

        
        throw new Exception("No route defined for this URI");
        

    }


    protected function callAction($controller, $method, $urlIndex = null) 

    {
        $controller = "App\\Controllers\\{$controller}";


        $controller = new $controller;

        if ( ! method_exists($controller, $method)) {

            throw new Exception("Controller does not respond to the {$method} action");            
        }

        return $controller->$method($urlIndex);

    }
}