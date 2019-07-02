<?php
class checkout extends Controller
{
    function __construct()
    {

    }
    function index()
    {
        if(isset($_GET['Authority'])){
            $result = $this->model->checkoutZarinpal($_GET);
            $data = ['orderInfo' => $result];
            $this->view('checkout/index', $data);
        }
    }
}
?>