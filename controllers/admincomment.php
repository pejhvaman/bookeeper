<?php

class admincomment extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = new Model;
        $level = $model::getUserLevel();
        if($level != 1 and $level != 2){
            header('location:'.URL.'adminlogin');
        }
    }

    function index()
    {
        $comments = $this->model->getComments();
        $data = ['comments' => $comments];
        $this->view('admin/comment/index', $data);
    }

    function confirm()
    {
        $this->model->confirm($_POST);
        header('location:' . URL . 'admincomment');
    }

    function unconfirm()
    {
        $ids = $_POST['ids'];
        $this->model->unconfirm($ids);
        header('location:' . URL . 'admincomment');
    }

    function delete()
    {
        $ids = $_POST['ids'];
        $this->model->delete($ids);
        header('location:' . URL . 'admincomment');
    }
}

?>