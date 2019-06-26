<?php

class model_showcart extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getBasket()
    {
        return parent::getBasket();
    }
    function getEntInfo($ident)
    {
        return parent::getEntInfo($ident);
    }

    function deleteBasket($id)
    {
        $sql = "delete from tbl_basket where id in (?)";
        $this->doQuery($sql, [$id]);
    }

    function updateBasket($basketId, $tedad)
    {
        $sql = "update tbl_basket set tedad=? where id=?";
        $this->doQuery($sql, [$tedad, $basketId]);
    }

    function sessionForTotPrice($totPrice)
    {
        parent::sessionInit();
        parent::sessionSet('totPrice', $totPrice);
    }
}