<?php

class RouteHandler
{
    public $routes = [];

    function get($uri, $controller)
    {
        $this->addRoute($uri, $controller, 'GET');
    }

    function post($uri, $controller)
    {
        $this->addRoute($uri, $controller, 'POST');
    }

    function delete($uri, $controller)
    {

        $this->addRoute($uri, $controller, 'DELETE');
    }

    function put($uri, $controller)
    {
        $this->addRoute($uri, $controller, 'PUT');
    }

    function patch($uri, $controller)
    {
        $this->addRoute($uri, $controller, 'PATCH');
    }

    private function addRoute($uri, $controller, $method)
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    }
    function route($uri, $method)
    {

        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require $route['controller'];
            }
        }

        $this->abort();
    }

    private function abort()
    {
        return require base_path("src/pages/404.php");
    }
}

?>