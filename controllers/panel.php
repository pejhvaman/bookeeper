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

    function index($activeTab = 'message')
    {
        $user_info = $this->model->getUserInfo();
        $user_orders_stat = $this->model->getStat();
        //print_r($user_orders_stat);
        $user_messages = $this->model->getMessages();
        $user_orders = $this->model->getUserOrders();
        $user_favorites = $this->model->getFav();
        $user_comments = $this->model->getUserComments();
        $codes = $this->model->getUserCodes();
        $data = ['user_info' => $user_info, 'orders_stat' => $user_orders_stat, 'messages' => $user_messages, 'orders' => $user_orders, 'favorites' => $user_favorites, 'comments' => $user_comments, 'codes' => $codes, 'activeTab' => $activeTab];
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

    function savecode()
    {
        if (isset($_POST['code'])) {
            $this->model->saveCode($_POST);
        }
    }

    function profile()
    {
        //this is for display current info:
        $user_info = $this->model->getUserInfo();
        $data = ['user_info' => $user_info];
        $this->view('panel/profile', $data);
    }

    function editprofile()
    {
        //this is for update changes in profile info:
        $data = $_POST;
        $this->model->editProfile($data);
        header('location:' . URL . 'panel/profile');
    }

    function changepass()
    {
        if (isset($_POST['current_pass'])) {
            $this->model->changePass($_POST);
        }
        $this->view('panel/changepass');
    }

    function logout()
    {
        $this->model->logOut();
        header('location:' . URL . 'index');
    }
}