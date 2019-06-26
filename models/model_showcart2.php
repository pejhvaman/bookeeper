<?php

class model_showcart2 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*function getPrevChosenAddress()
    {
        @self::sessionInit();
        $addressInfo = self::sessionGet('chosen_address');
        $addressInfo = unserialize($addressInfo);
        return $addressInfo;
    }*/

    function checkCode($code)
    {
        $sql = "select * from tbl_takhfif where kod=?";
        $res = $this->doSelect($sql, [$code]);
        if (sizeof($res) > 0) {
            return $res[0]['darsad'];
        } else {
            return 0;
        }
    }

    function calculateFinalPrice($code)
    {
        $basket = parent::getBasket();
        $basketDiscountPrice = $basket[2];
        //self::sessionInit();
        $totPrice = $basket[1];

        parent::sessionInit();
        $postTypeInfo = parent::sessionGet('post_type');
        $postTypeInfo = unserialize($postTypeInfo);
        $postPrice = $postTypeInfo['hazine'];

        $codeDarsadTakhfif = $this->checkCode($code);

        $totalPriceWithCode = 0;
        if ($codeDarsadTakhfif != 0) {
            $totalPriceWithCode = ($codeDarsadTakhfif * $totPrice) / 100;
        }


        $finalPrice = $totPrice + $postPrice - $basketDiscountPrice - $totalPriceWithCode;

        return $finalPrice;

    }
}