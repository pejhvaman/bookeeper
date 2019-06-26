<?php

class showcart1 extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $totPrice = $this->model->getTotalPriceOfPrevStep();
        $address = $this->model->getAddress();
        $post_types = $this->model->getPostTypes();
        $data = ['address' => $address, 'post_types'=>$post_types, 'totPrice'=>$totPrice];
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

    function deleteaddress()
    {
        $address_id = $_POST['addressId'];
        $this->model->deleteAddress($address_id);
        $address_ha = $this->model->getAddress();
        echo json_encode($address_ha);
    }

    function chosenaddress()
    {
        $address_id = $_POST['addressId'];
        $this->model->chosenAddress($address_id);
    }

    function updatetotprice_sessionnewtotprice()
    {
        //
        $id_post_type = $_POST['id_post_type'];
        $post_type_price = $this->model->getPostTypePriceByIdAndSetSessionForPostType($id_post_type);
        $totPrice = $this->model->getTotalPriceOfPrevStep();
        $msg = [$post_type_price, $totPrice];
        echo json_encode($msg);
    }
    /*function gettotpriceofprevstep()
    {
        $totPrice = $this->model->getTotalPriceOfPrevStep();
        echo json_encode($totPrice);

    }*/
}