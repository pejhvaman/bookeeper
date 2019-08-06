<?php

class model_adminuser extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getUsers()
    {
        $sql = "select tbl_users.*, tbl_user_level.title as levelTitle from tbl_users left join tbl_user_level on tbl_users.sath=tbl_user_level.id order by id desc ";
        $res = $this->doSelect($sql);
        return $res;
    }

    function changeLevel1($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_users set sath=1 where id in (" . $ids . ") ";
        $this->doQuery($sql);
    }

    function changeLevel2($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_users set sath=2 where id in (" . $ids . ") ";
        $this->doQuery($sql);
    }

    function changeLevel3($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_users set sath=3 where id in (" . $ids . ") ";
        $this->doQuery($sql);
    }

    function deleteUser($ids)
    {
        $ids = implode(',', $ids);
        $sql = "delete from tbl_users where id in (" . $ids . ") ";
        $this->doQuery($sql);
    }
}

?>