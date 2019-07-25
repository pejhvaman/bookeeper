<?php

class model_admincomment extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getComments()
    {
        $sql = "select * from tbl_comment";
        $comments = $this->doSelect($sql);
        return $comments;
    }

    function confirm($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_comment set confirm=1 WHERE id IN (".$ids.")";
        $this->doQuery($sql);
    }

    function unconfirm($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_comment set confirm=0 WHERE id IN (".$ids.")";
        $this->doQuery($sql);
    }

    function delete($ids)
    {
        $ids = implode(',', $ids);
        $sql = "delete from tbl_comment WHERE id IN (".$ids.")";
        $this->doQuery($sql);
    }
}

