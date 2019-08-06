<?php

class adminorder extends Controller
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
        $orders = $this->model->getOrders();
        $data = ['orders' => $orders];
        $this->view('admin/order/index', $data);
    }

    function detail($order_id)
    {
        $order_info = $this->model->getOrderInfo($order_id);
        $data = ['orderInfo' => $order_info];
        $this->view('admin/order/detail', $data);
    }

    function changeorderinfo($order_id)
    {
        $data = $_POST;
        $this->model->changeOrderInfo($order_id, $data);
    }

    function showfactor($order_id)
    {
        $order_info = $this->model->getOrderInfo($order_id);
        $data = ['orderInfo' => $order_info];
        $this->view('admin/order/factor', $data, 0);
    }

    function deleteorder()
    {
        $ids = $_POST['ids'];
        $this->model->deleteOrder($ids);
        header('location:' . URL . 'adminorder');
    }
}

?>