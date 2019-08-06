<?php

class adminuser extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = new Model;
        $level = $model::getUserLevel();
        if($level != 1 and $level !=2){
            header('location:'.URL.'adminlogin');
        }
    }

    function index()
    {
        $users = $this->model->getUsers();
        $data = ['users' => $users];
        $this->view('admin/user/index', $data);
    }

    function changelevel1()
    {
        $ids = $_POST['ids'];
        $this->model->changeLevel1($ids);
        header('location:' . URL . 'adminuser');
    }

    function changelevel2()
    {
        $ids = $_POST['ids'];
        $this->model->changeLevel2($ids);
        header('location:' . URL . 'adminuser');
    }

    function changelevel3()
    {
        $ids = $_POST['ids'];
        $this->model->changeLevel3($ids);
        header('location:' . URL . 'adminuser');
    }

    function deleteuser()
    {
        $ids = $_POST['ids'];
        $this->model->deleteUser($ids);
        header('location:' . URL . 'adminuser');
    }
}

?>