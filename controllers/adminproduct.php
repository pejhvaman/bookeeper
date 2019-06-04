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

    function addproduct($idbook = '')
    {
        if (isset($_POST['title'])) {
            //var_dump($_POST);
            $this->model->addProduct($_POST, $idbook);
        }
        $categories = $this->model->getCats();
        $entesharat = $this->model->getEntesharat();
        $bookInfo = $this->model->getProductInfo($idbook);
        $data = ['categories' => $categories, 'entesharat' => $entesharat, 'bookInfo' => $bookInfo];
        $this->view('admin/product/add', $data);
    }

    function deleteproduct()
    {
        $ids = $_POST['ids'];
        $this->model->deleteProduct($ids);
        //header('location:' . URL . 'adminproduct');
    }
}
