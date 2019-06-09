<?php

class product extends Controller
{
    function __construct()
    {

    }

    function index($id)
    {
        $bookInfo = $this->model->productInfo($id);
        $data = ['bookInfo' => $bookInfo];
        $this->view('product/index', $data);
    }

    function tab($idbook)
    {
        $secNum = $_POST['tabNum'];
        if ($secNum == 0) {
            $properties = $this->model->getProperties($idbook);
            $this->view('product/property_tab', $properties, 0);
        }
        if ($secNum == 1) {
            $comments = $this->model->getComments($idbook);
            $this->view('product/comments_tab', $comments, 0);
        }
        if ($secNum == 2) {
            $quesAndAns = $this->model->getQuestions($idbook);
            $questions = $quesAndAns[0];
            $answers = $quesAndAns[1];
            $this->view('product/questions_tab', [$questions, $answers], 0);
        }
    }

    function like($idbook)
    {
        $likedNum = $_POST['liked'];
        $this->model->updateLikes($idbook, $likedNum);
    }

    function updateLikeCount()
    {
        $hasClass = $_POST['hasClass'];
        $idbook = $_POST['idbook'];
        $likeCount = $_POST['likeCount'];
        $this->model->updateLikeCount($hasClass, $idbook, $likeCount);
    }

    function updateDisLikeCount()
    {
        $hasClass = $_POST['hasClass'];
        $idbook = $_POST['idbook'];
        $dislikeCount = $_POST['dislikeCount'];
        $this->model->updateDisLikeCount($hasClass, $idbook, $dislikeCount);
    }
    function addtobasket($idbook)
    {
        $this->model->addToBasket($idbook);
    }

}