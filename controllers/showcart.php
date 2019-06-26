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

    function updatebasket()
    {
        $basketId = $_POST['basketId'];
        $tedad = $_POST['tedad'];
        $this->model->updateBasket($basketId, $tedad);
        $basket = $this->model->getBasket();
        echo json_encode($basket);
    }

    //in baraye gheymate kol be joz hazineye post
    function session_for_totPrice()
    {
        $totPrice = $_POST['totPrice'];
        $this->model->sessionForTotPrice($totPrice);
    }

}