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

        foreach ($result as $key => $value) {
            $entInfo = $this->getEntInfo($value['identesharat']);
            $result[$key]['entInfo'] = $entInfo;
        }

        $priceTotalAll = 0;
        foreach ($result as $item)
        {
            $price = $item['gheymat'];
            $tedad = $item['tedad'];
            $priceTotal = $price * $tedad;
            $priceTotalAll = $priceTotalAll + $priceTotal;
        }

        //print_r($result);
        return [$result, $priceTotalAll];
    }

    function getEntInfo($ident)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $entInfo = $this->doSelect($sql, [$ident], 1);
        return $entInfo;
    }

    function deleteBasket($id)
    {
        $sql = "delete from tbl_basket where id in (?)";
        $this->doQuery($sql, [$id]);
    }

}