<?php

class register extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $this->view('register/index',[],0);
    }
}