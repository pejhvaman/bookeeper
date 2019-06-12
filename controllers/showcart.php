<?php

class showcart extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $basket = $this->model->getBasket()[0];
        $totPrice = $this->model->getBasket()[1];
        $data = ['basket' => $basket, 'totPrice'=>$totPrice];
        $this->view('showcart/index', $data);
    }

    function deletebasket($basketId)
    {
        $this->model->deleteBasket($basketId);
        $basket = $this->model->getBasket();
        echo json_encode($basket);
    }

}