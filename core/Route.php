<?php

namespace core;

class Route
{
    protected $routes = [];

    public function add($route, $method) {
        $this->routes[$route] = ['method' => $method];
    }

    public function match($url) {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = 'app\\Controller\\RouteController';
            $methodName = $this->routes[$url]['method'];
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            echo "404 - Seite nicht gefunden";
        }
    }
}