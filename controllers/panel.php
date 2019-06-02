<?php

class panel extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $this->view('panel/index');
    }
}