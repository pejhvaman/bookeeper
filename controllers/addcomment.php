<?php

class addcomment extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index($product_id)
    {
        $product_info = $this->model->getProductInfo($product_id);
        $comment_info = $this->model->getCommentInfo($product_id);
        $data = ['product_info' => $product_info, 'comment_info' => $comment_info];
        $this->view('addcomment/index', $data);
    }

    function savecomment($product_id)
    {
        if (isset($_POST['title'])) {
            $this->model->saveComment($product_id, $_POST);
        }
    }
}

?>