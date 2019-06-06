<?php

class panel extends Controller
{
    public $checkLogin = '';

    function __construct()
    {
        //baraye inke NATAVAN mostaghim be panel dastresi dash :
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if ($this->checkLogin == false) {
            header('location:' . URL . 'login');
        }
    }

    function index()
    {
        $this->view('panel/index');
    }
}