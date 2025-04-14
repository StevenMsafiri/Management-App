<?php

Class  App
{

    private $controller = "home";
    private $method = "index";
    private $params = [];


    public function __construct()
    {
        $url = $this->splitURL();

        // Default controller and method if nothing is found
        $defaultController = 'home';
        $defaultMethod = 'index';

        // Check if requested controller file exists
        if (isset($url[0]) && file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = strtolower($url[0]);
            unset($url[0]);

            require "../app/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
        } else {
            // Controller doesn't exist — redirect to default
            header("Location: " . ROOT . "/$defaultController/$defaultMethod");
            exit;
        }

        // Check if method exists in controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // You can also store remaining $url elements as parameters if needed
        $this->params = array_values($url);

        // Finally, call the method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    private function splitURL()
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : "home";
        return explode("/", filter_var(trim($url, '/')),FILTER_SANITIZE_URL);

    }


}