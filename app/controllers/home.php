<?php

class Home extends Controller {

    //sets the page title
    public $title = 'index';

    public function __construct()
    {
        //activates the log
        APP::$log = "true";
        //logs automaticall that this class is called
        $this->log_loaded_class(get_class());
    }
    //standard startup function when nothing else is declared
    public function index()
    {
        //loads an model
        $model = $this->load_model('events');
        $example = $model->test(1);
        //loads the head with the title
        $this->view('head', ['title' => $this->title, 'styles' => []]);
        //loads the body
        $this->view('home/index', ['title' => $this->title]);
        //loads the footer with scripts
        $this->view('footer', ['scripts' => [/* Insert here scripts without ending "script" */]]);
    }
}