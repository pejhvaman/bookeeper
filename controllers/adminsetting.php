<?php

class adminsetting extends Controller
{
    public function __construct()
    {
    }

    function index()
    {
        $this->view('admin/setting/index');
    }

    function savesetting()
    {
        if (isset($_POST['limit_scrollSlider'])) {
            $this->model->saveSetting($_POST);
        }
        header('location:' . URL . 'adminsetting');
    }
}

?>