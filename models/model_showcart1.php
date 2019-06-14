<?php

class model_showcart1 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAddress()
    {
        $sql = "select * from tbl_user_address";
        $res = $this->doSelect($sql);
        return $res;
    }
}