<?php

namespace App;

class Router
{

    public Request $request;

    protected array $routes = [];

    public function __construct()
    {

        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            echo 'Page Not Found';
            die();
        }


        if (is_string($callback))
            return $this->render($callback);

        return call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        ob_start();
        include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }


}