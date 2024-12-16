<?php

namespace core;

class Route
{
    protected $routes = [];

    public function add($route, $method) {
        $this->routes[$route] = ['method' => $method];
    }

    public function match($url) {
        $controllerName = 'app\\Controller\\RouteController';
        $controller = new $controllerName();

        if (array_key_exists($url, $this->routes)) {
            $methodName = $this->routes[$url]['method'];
            $controller->$methodName();
        } else {
            $controller->pageNotFoundAction();
        }
    }
}