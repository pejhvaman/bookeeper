<?php

class showcart2 extends Controller
{
    function __construct()
    {

    }

    function index($status = '')
    {
        //$addressInfo = $this->model->getPrevChosenAddress();
        $data = ['Status' => $status];
        $this->view('showcart2/index', $data);
    }

    function checkcode($code = '')
    {
        /*if (isset($_POST['code'])){
            $code = $_POST['code'];
        }else{
            $code = '';
        }*/
        if($code==''){
            $response = $this->model->checkCode($code);
            echo $response;
        }else {
            $response = 0;
            echo $response;
        }


        //$final_price = $this->model->calculateFinalPrice($code);


        //var_dump($response);
    }

    function calculatefinalprice($code = '')
    {
        /*if (isset($_POST['codeTakhfif'])){
            $code = $_POST['codeTakhfif'];
        }else {
            $code = '';
        }*/

        $finalPrice = $this->model->calculateFinalPrice($code);
        echo $finalPrice;
    }

    function saveorder()
    {
        $this->model->saveOrder($_POST);
    }
}