<?php

/*
 * Routing:
 * https://example.de/controller/function/var1/var2/var3/...
 *
 */

class App {

    public static $log_data = [];

    // log
    public static $log = true;

    //standard controller when nothing else is declared
    protected $controller = 'home';
    //standard function when nothing else is declared
    protected $method = 'index';
    //params
    protected $params = [];

    public function __construct()
    {
        // log that core is loaded
        App::log('core/App loaded');

        // parses the url
        $url = $this->parseUrl();

        //set Controller
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        //require controller
        require_once '../app/controllers/' . $this->controller . '.php';
        //load controller class (filename = class)
        $this->controller = new $this->controller;

        //set function
        if (isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //set params
        $this->params = $url ? array_values($url) : [];

        //starts function
        call_user_func_array([$this->controller, $this->method], $this->params);
        //outputs $log
        if (App::$log == true) {
            foreach (App::$log_data as $item) {
                echo "<script>console.log('%c(PHP) ' + '%c$item', 'color: blue', 'color: black')</script>";
            }
        }
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    public static function log($data)
    {
            App::$log_data[] = $data;
    }
}