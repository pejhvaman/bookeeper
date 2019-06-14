<?php

class showcart1 extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $address = $this->model->getAddress();
        $data = ['address' => $address];
        $this->view('showcart1/index', $data);
    }

    function addtoaddress()
    {
        $this->model->addToAddress($_POST);
        /*$address = $this->model->getAddress();
        echo json_encode($address);*/
    }

    function editaddress($addressId)
    {
        $thisAddress = $this->model->getAddressInfo($addressId);
        echo json_encode($thisAddress);
    }
}