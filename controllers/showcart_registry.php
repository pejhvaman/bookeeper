<?php

class showcart_registry extends Controller
{
    public $checkLogin = '';
    function __construct()
    {
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if ($this->checkLogin != false) {
            header('location:' . URL . 'showcart1');
        }
    }
    function index()
    {
        $this->view('showcart_registry/index',[],0);
    }

}

?>
