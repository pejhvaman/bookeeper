<?php

class adminslider extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_POST['title'])) {
            $this->model->addSlider($_POST, $_FILES);
        }
        $slider1 = $this->model->getSlider1();
        $data = ['slider1' => $slider1];
        $this->view('admin/slider/index', $data);
    }

    function deleteitem()
    {
        $this->model->deleteItem($_POST);
        header('Location:' . URL . 'adminslider/index');
    }
}

?>