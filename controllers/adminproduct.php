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
        header('location:' . URL . 'adminproduct');
    }

    function property($idbook)
    {
        $propertyInfo = $this->model->getProperty($idbook);
        $bookInfo = $this->model->getProductInfo($idbook);
        $data = ['property' => $propertyInfo, 'bookInfo'=>$bookInfo];
        $this->view('admin/product/property', $data);
    }

    function addproperty($idbook)
    {
        if (isset($_POST['title'])){
            $this->model->addProperty($_POST, $idbook);
            header('location:'.URL.'adminproduct/property/'.$idbook);
        }
        //
        $bookInfo = $this->model->getProductInfo($idbook);
        $data = ['bookInfo'=>$bookInfo];
        $this->view('admin/product/addproperty', $data);


    }
}
