<?php

class adminstat extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('admin/stat/index');
    }

    function order()
    {
        $order_stat = $this->model->order($_POST);
        $data = ['order_stat' => $order_stat];
        $this->view('admin/stat/order', $data);
    }
}

?>