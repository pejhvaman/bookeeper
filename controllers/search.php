<?php

class search extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $this->view('search/index');
    }
}