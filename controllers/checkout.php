<?php

class checkout extends Controller
{
    function __construct()
    {

    }

    function index($order_id)
    {
        if (isset($_GET['Authority'])) {
            //var_dump($_GET);
            $result = $this->model->checkoutZarinpal($_GET);
            $data = ['orderInfo' => $result];
        }
        if (isset($order_id)) {
            $order_info = $this->model->getOrderInfo($order_id);
            $data = ['orderInfo' => $order_info];
        }
        $this->view('checkout/index', $data);

    }

    function payonline($order_id)
    {
        $this->model->payOnline($order_id);

    }

    function showerror()
    {
        $error = $_GET['error'];
        $order_id = $_GET['order_id'];
        $data = ['error' => $error, 'order_id'=>$order_id];
        $this->view('checkout/showerror', $data, 0);
    }
}

?>