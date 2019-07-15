<?php

class panel extends Controller
{
    public $checkLogin = '';

    function __construct()
    {
        //baraye inke NATAVAN mostaghim be panel dastresi dash :
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if ($this->checkLogin == false) {
            header('location:' . URL . 'login');
        }
    }

    function index()
    {
        $user_info = $this->model->getUserInfo();
        $user_orders_stat = $this->model->getStat();
        //print_r($user_orders_stat);
        $user_messages = $this->model->getMessages();
        $user_orders = $this->model->getUserOrders();
        $user_favorites = $this->model->getFav();
        $user_comments = $this->model->getUserComments();
        $data = ['user_info' => $user_info, 'orders_stat' => $user_orders_stat, 'messages' => $user_messages, 'orders' => $user_orders, 'favorites' => $user_favorites, 'comments' => $user_comments];
        $this->view('panel/index', $data);
    }

    function delete_favorite()
    {
        $id_product = $_POST['id'];
        $remain = $this->model->deleteFav($id_product);
        echo json_encode($remain);
    }

    function deletecomment()
    {
        $comment_id = $_POST['comment_id'];
        $remain = $this->model->deleteComment($comment_id);
        echo json_encode($remain);
    }
}