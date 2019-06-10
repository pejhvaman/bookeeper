<?php

class model_showcart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getBasket()
    {
        $sql = "select tbl_basket.tedad, tbl_basket.id as basketId, tbl_books.* from tbl_basket join tbl_books on tbl_basket.idbook = tbl_books.id where tbl_basket.cookie=?";
        $cookie = self::getBasketCookie();
        $param = [$cookie];
        $result = $this->doSelect($sql, $param);
        $ident = $result[0];

        $entInfo = $this->getEntInfo($ident['identesharat']);
        $result[0]['entInfo'] = $entInfo;
        //print_r($result);
        return $result;
    }

    function getEntInfo($ident)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $entInfo = $this->doSelect($sql, [$ident], 1);
        return $entInfo;
    }
}