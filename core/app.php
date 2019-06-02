<?php

class App
{
    public $controller = 'index';
    public $method = 'index';

    function __construct()
    {
        if (isset($_GET['url'])){
            $url = $_GET['url'];
        }else{
            $url = 'index/index';
        }

        $url = $this->parseUrl($url);
        if (isset($url[0])) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        if (isset($url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
        $params = array_values($url);
        $controllerUrl = 'controllers/' . $this->controller . '.php';
        if (file_exists($controllerUrl)) {
            require($controllerUrl);
            $controllerObj = new $this->controller;
            $controllerObj->model($this->controller);
            if (method_exists($controllerObj, $this->method)) {
                call_user_func_array([$controllerObj, $this->method], $params);
            }
        }

    }

    function parseUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL); //karakteraye azafe va mokharebo filter mikone
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}