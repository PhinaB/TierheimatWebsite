<?php

namespace core;

use app\Controller\StaticPageController;

class Route
{
    protected $routes = [];

    public function add($route, $controller, $method, $attribut)
    {
        $this->routes[$route] = ['controller' => $controller, 'method' => $method, 'attribut' => $attribut];
    }

    public function match($url) {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = 'app\\Controller\\' . $this->routes[$url]['controller'];
            $controller = new $controllerName();

            $methodName = $this->routes[$url]['method'];
            $attribut = $this->routes[$url]['attribut'];

            if ($attribut !== "") {
                $controller->$methodName($attribut);
            }
            else {
                $controller->$methodName();
            }
        } else {
            $rController = new StaticPageController();
            $rController->pageNotFoundAction();
        }
    }
}