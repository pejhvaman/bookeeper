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

    function checkcode($code='')
    {
        /*if (isset($_POST['code'])){
            $code = $_POST['code'];
        }else{
            $code = '';
        }*/
        $response = $this->model->checkCode($code);

        //$final_price = $this->model->calculateFinalPrice($code);

        echo $response;
        //var_dump($response);
    }

    function calculatefinalprice($code='')
    {
        /*if (isset($_POST['codeTakhfif'])){
            $code = $_POST['codeTakhfif'];
        }else {
            $code = '';
        }*/

        $finalPrice = $this->model->calculateFinalPrice($code);
        echo $finalPrice;
    }
}