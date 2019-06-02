<?php

class Adminproduct extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $books = $this->model->getBooks();
        $data = ['books' => $books];
        $this->view('admin/product/index', $data);
    }

    function addproduct()
    {
        if (isset($_POST['title'])){
            //var_dump($_POST);
            $this->model->addProduct($_POST);
        }
        $categories = $this->model->getCats();
        $entesharat = $this->model->getEntesharat();
        $data = ['categories'=>$categories, 'entesharat'=>$entesharat];
        $this->view('admin/product/add', $data);
    }
}
