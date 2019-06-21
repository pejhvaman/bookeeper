<?php

class showcart2 extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        //$addressInfo = $this->model->getPrevChosenAddress();
        $data = [];
        $this->view('showcart2/index', $data);
    }
}