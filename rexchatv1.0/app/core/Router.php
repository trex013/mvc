<?php

class Router
{
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    protected $controller = "Home";// Default 
    protected $method = "index";
    protected $params = [];

    public static function load($router_file)
    {
        $router = new Router();

        require $router_file;

        return $router;

    }

    public function get ($uri, $path)
    {
        $this->routes["GET"][$uri] = $path;
    }

    public function post ($uri, $path)
    {
        $this->routes["POST"][$uri] = $path;
    }

    public function direct ($uri, $method)
    {
        // if (array_key_exists($uri[0], $this->routes[$method]))
        // {
        //     $uri[0] = $this->routes[$method][$uri[0]];

        //     $this->directAction($uri);

        // } else {

        //     throw new Exception("Not exist:: Check Your route file..."); 

        // }

        $this->directAction($uri);
        
    }

    protected function directAction($uri)
    {

        if (file_exists("../app/controllers/".$uri[0].".php"))
        {
            $this->controller = ucfirst($uri[0]);

            unset($uri[0]);
 
        }

        require_once "../app/controllers/".$this->controller.".php";

        $this->controller = ucfirst($this->controller);

        $this->controller = new $this->controller;

        if (isset($uri[1]))
        {

            if (method_exists($this->controller, $uri[1]))
            {
                $this->method = $uri[1];

                unset($uri[1]);

                $this->params = $uri ? array_values($uri) : [];

                unset($uri);
            }

        }

        call_user_func_array([$this->controller, $this->method], [$this->params]);
    }
}

?>