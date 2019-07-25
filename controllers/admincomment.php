<?php

class admincomment extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $comments = $this->model->getComments();
        $data = ['comments' => $comments];
        $this->view('admin/comment/index', $data);
    }

    function confirm()
    {
        $ids = $_POST['ids'];
        $this->model->confirm($ids);
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