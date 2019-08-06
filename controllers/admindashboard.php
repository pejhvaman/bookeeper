<?php

class admindashboard extends Controller
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
        $order_stat = $this->model->getStat();
        $data = ['order_stat' => $order_stat];
        $this->view('admin/dashboard/index', $data);
    }
}

?>