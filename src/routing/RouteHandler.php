<?php
require_once base_path("src/routing/middleware/Middleware.php");
class RouteHandler
{
    public $routes = [];

    function get($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'GET');
    }

    function post($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'POST');
    }

    function delete($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'DELETE');
    }

    function put($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'PUT');
    }

    function patch($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'PATCH');
    }

    private function addRoute($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    function route($uri, $method)
    {

        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require $route['controller'];
            }
        }

        $this->abort();
    }

    private function abort()
    {
        return require base_path("src/views/404.php");
    }

    public function restrictTo($key)
    {
        $this->routes[count($this->routes) - 1]['middleware'] = $key;
        return $this;
    }
}

?>