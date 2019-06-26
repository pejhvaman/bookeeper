<?php

class showcart2 extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        //$addressInfo = $this->model->getPrevChosenAddress();
        $data = [];
        $this->view('showcart2/index', $data);
    }

    function checkcode()
    {
        if (isset($_POST['code'])){
            $code = $_POST['code'];
        }else{
            $code = '';
        }
        $response = $this->model->checkCode($code);

        //$final_price = $this->model->calculateFinalPrice($code);
        $msg = [$response];
        echo json_encode($msg);
        //var_dump($response);
    }

    function calculatefinalprice()
    {
        if (isset($_POST['codeTakhfif'])){
            $code = $_POST['codeTakhfif'];
        }else {
            $code = '';
        }

        $finalPrice = $this->model->calculateFinalPrice($code);
        echo json_encode($finalPrice);
    }
}