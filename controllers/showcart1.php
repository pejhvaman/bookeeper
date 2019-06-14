<?php

class showcart1 extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $address = $this->model->getAddress();
        $data = ['address'=>$address];
        $this->view('showcart1/index', $data);
    }
}