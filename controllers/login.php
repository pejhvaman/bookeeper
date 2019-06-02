<?php

class login extends Controller
{
    public function __construct()
    {
    }

    function index()
    {
        $this->view('login/index', [], 0);
    }
}