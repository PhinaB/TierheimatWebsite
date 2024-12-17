<?php

namespace core;

use app\Controller\RouteController;

class Route
{
    protected $routes = [];

    public function add($route, $controller, $method, $attribut)
    {
        $this->routes[$route] = ['controller' => $controller, 'method' => $method, 'attribut' => $attribut];
    }

    public function match($url) {
        $controllerName = 'app\\Controller\\' . $this->routes[$url]['controller'];

        $controller = new $controllerName();

        if (array_key_exists($url, $this->routes)) {
            $methodName = $this->routes[$url]['method'];
            $attribut = $this->routes[$url]['attribut'];

            if ($attribut !== "") {
                $controller->$methodName($attribut);
            }
            else {
                $controller->$methodName();
            }
        } else {
            $rController = new RouteController();
            $rController->pageNotFoundAction();
        }
    }
}