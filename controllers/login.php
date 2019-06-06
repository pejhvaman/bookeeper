<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('login/index', [], 0);
    }
    function checkuser()
    {
        if (isset($_POST['email'])){
            //print_r($_POST);
            $this->model->checkUser($_POST);
            Model::sessionInit();
            $check = Model::sessionGet('userId');
            if($check==false){
                header('location:'.URL.'login');
            }else {
                echo 'Login Success!';
                header('location:'.URL.'panel');
            }
        }
    }
}