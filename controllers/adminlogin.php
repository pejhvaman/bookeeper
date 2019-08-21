<?php

class adminlogin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('admin/login/index', [], 0);
    }

    function checkuser()
    {
        if (isset($_POST['username'])){
            //print_r($_POST);
            $this->model->checkUser($_POST);
            Model::sessionInit();
            $check = Model::sessionGet('userId');
            if($check==false){
                header('location:'.URL.'adminlogin');
            }else {
                echo 'Login Success!';
                header('location:'.URL.'admindashboard');
            }
        }
    }
}

?>