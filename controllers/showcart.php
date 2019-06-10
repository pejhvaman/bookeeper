<?php

class showcart extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $basket = $this->model->getBasket();
        $data = ['basket' => $basket];
        $this->view('showcart/index', $data);
    }


}