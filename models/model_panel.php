<?php

class model_panel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getUserInfo()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_users where id=?";
        $result = $this->doSelect($sql, [$user_id], 1);
        return $result;
    }

    function getStat()
    {
        $stat = [];
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_order where user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        $stat['orders_num'] = sizeof($result);
        return $stat;
    }

    function getMessages()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_message where user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        return $result;
    }

    function getUserOrders()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_order where user_id=? ORDER by id desc";
        $result = $this->doSelect($sql, [$user_id]);
        //print_r($result);
        return $result;
    }

    function getFav()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        //$sql = "select * from tbl_favorite where user_id=?";
        $sql = "select tbl_favorite.product_id, tbl_favorite.user_id, tbl_books.* from tbl_favorite join tbl_books on tbl_favorite.product_id = tbl_books.id where tbl_favorite.user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        foreach ($result as $key => $item) {
            $id_entesharat = $item['identesharat'];
            $sql = "select * from tbl_entesharat where id=?";
            $entesharat = $this->doSelect($sql, [$id_entesharat], 1);
            $entesharat_nam = $entesharat['nam'];
            $result[$key]['entesharat'] = $entesharat_nam;
        }
        return $result;
    }

    function deleteFav($id){
        $sql = "delete from tbl_favorite where product_id=?";
        $this->doQuery($sql, [$id]);
        $result = $this->getFav();
        return $result;
    }

    function getUserComments()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select tbl_comment.*, tbl_books.esm , tbl_books.nevisande from tbl_comment left join tbl_books on tbl_comment.product_id = tbl_books.id where tbl_comment.user_id = ?";
        $result = $this->doSelect($sql, [$user_id]);
        //print_r($result);
        return $result;
    }

    function deleteComment($id)
    {
        $sql = "delete from tbl_comment where id=?";
        $this->doQuery($sql,[$id]);
        $result = $this->getUserComments();
        return $result;
    }
}