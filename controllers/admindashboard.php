<?php

class admindashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $order_stat = $this->model->getStat();
        $data = ['order_stat' => $order_stat];
        $this->view('admin/dashboard/index', $data);
    }
}

?>