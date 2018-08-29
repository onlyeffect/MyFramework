<?php

namespace Core;

use \Exception;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load(string $path)
    {
        $router = new self;

        require __DIR__ . "/../$path";

        return $router;
    }

    public function get(string $uri, string $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    
    
    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
    
    public function direct(string $uri, string $method)
    {
        if(array_key_exists($uri, $this->routes[$method])){
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        } else {
            throw new Exception("Route \"$uri\" does not exists for $method method.");
        }
    }

    public function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
    
        if(! method_exists($controller, $action)){
            throw new Exception("$action action is not defined in $controller controller.");
        } else {
            return $controller->$action();
        }
    }
}
