<?php

class Controller {

    //loads model
    protected function load_model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    //loads views
    protected function view($view, $data) {
        App::log('View '. $view .' loaded');
        require_once '../app/views/' . $view . '.php';
    }
    //logs Controller
    protected function log_loaded_class ($class) {
        App::log('Controller '. $class .' loaded');
    }
}