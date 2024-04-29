<?php

namespace Core;

class Router
{
    private array $routes = [];


    private function add($uri, $controller_path, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller_path,
            'method' => $method,
            'middleware' => null,
        ];
        return $this;
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function get($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'GET');
    }

    public function post($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'POST');
    }

    public function delete($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'DELETE');
    }

    public function push($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'PUSH');
    }

    public function patch($uri, $controller_path)
    {
        return $this->add($uri, $controller_path, 'PATCH');
    }
}
