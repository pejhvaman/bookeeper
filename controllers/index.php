<?php

class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $slider1 = $this->model->getSlider1();
        $slider2 = $this->model->getSlider2();
        $slider2_item = $slider2[0];
        $end_date = $slider2[1];
        $scrollslider1 = $this->model->getScrollSlider1();
        $data = [$slider1, $slider2_item, $end_date, $scrollslider1];
        $this->view('index/index', $data);
    }
}