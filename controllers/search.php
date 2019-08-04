<?php

class search extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index($idCategory)
    {
        $categoryInfo = $this->model->getCategoryInfo($idCategory);
        $categories = $this->model->getCategories();
        $entesharats = $this->model->getEntesharats();
        $data = ['categoryInfo' => $categoryInfo, 'categories' => $categories, 'entesharats'=>$entesharats];
        $this->view('search/index', $data);
    }

    function doSearch()
    {
        //print_r($_POST);
        $products = $this->model->doSearch($_POST);
        echo json_encode($products);
    }
}