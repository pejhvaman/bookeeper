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

    function addtoaddress($addressId='')
    {
        $this->model->addToAddress($_POST, $addressId);
    }

    function editaddress($addressId)
    {
        $thisAddress = $this->model->getAddressInfo($addressId);
        echo json_encode($thisAddress);
    }
}