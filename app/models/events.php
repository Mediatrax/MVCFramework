<?php

class events extends model {

    protected $db;

    function __construct()
    {
        //connect to your db
        $this->db = $this->db_connect();
        App::log('Model '. get_class() .' loaded');
    }

    function test($id)
    {
        // make your data things
    }
    function setpw(){}
    function setusername(){}
}