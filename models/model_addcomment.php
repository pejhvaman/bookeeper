<?php

class model_addcomment extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getProductInfo($product_id)
    {
        $sql = "select * from tbl_books where id=?";
        $result = $this->doSelect($sql, [$product_id], 1);
        return $result;
    }

    function getCommentInfo($product_id)
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_comment where user_id=? and product_id=?";
        $params = [$user_id, $product_id];
        $result = $this->doSelect($sql, $params, 1);
        //print_r($result);
        return $result;
    }

    function saveComment($pro_id, $data)
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');

        $matn = $data['nazar'];
        $title = $data['title'];

        $sabt_time = Model::jalaliDate();

        $result = $this->getCommentInfo($pro_id);

        $comment_id = $result['id'];

        if (isset($result['id'])) {
            $sql = "update tbl_comment set title=?,matn=?,sabt_time=? where id=?";
            $params = [$title, $matn, $sabt_time, $comment_id];
        }//update
        else {
            $sql = "insert into tbl_comment (title,matn,user_id,product_id,sabt_time) values (?,?,?,?,?)";
            $params = [$title, $matn, $user_id, $pro_id, $sabt_time];
        }//insert

        $this->doQuery($sql, $params);

        header('location:' . URL . 'addcomment/index/' . $pro_id);
    }

}

?>