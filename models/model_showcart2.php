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
        $sql = "select * from tbl_takhfif where kod=? and used=0";
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
        //$totPrice = parent::sessionGet('totPrice');
        $postTypeInfo = parent::sessionGet('post_type');
        $postTypeInfo = unserialize($postTypeInfo);
        $postPrice = $postTypeInfo['hazine'];

        $codeDarsadTakhfif = $this->checkCode($code);

        $totalPriceWithCode = 0;
        if ($codeDarsadTakhfif != 0) {
            $totalPriceWithCode = ($codeDarsadTakhfif * $totPrice) / 100;
        }


        $finalPrice = $totPrice + $postPrice - $basketDiscountPrice - $totalPriceWithCode;
        //self::sessionSet('totPrice',$finalPrice);
        //setSessionForFinalPrice($finalPrice);

        return $finalPrice;

    }

    /*function setSessionForFinalPrice($finalPrice)
    {
        parent::sessionInit();
        parent::sessionSet('totPrice', $finalPrice);
    }*/

    function saveOrder($data)
    {
        //var_dump($data);
        parent::sessionInit();
        $chosen_address = parent::sessionGet('chosen_address');
        $chosen_address = unserialize($chosen_address);
        //var_dump($chosen_address);
        $esm_girande = $chosen_address['nam'];
        $shomare_mobile = $chosen_address['shomare'];
        $kod_posti = $chosen_address['kodposti'];
        $ostan = $chosen_address['ostan'];
        $shahr = $chosen_address['shahr'];
        $adres_girande = $chosen_address['adres'];

        $basketInfo = parent::getBasket();
        $sabad = $basketInfo[0];
        $basket_price = $basketInfo[1];
        $basket_discount = $basketInfo[2];
        $sabad = serialize($sabad);


        $postTypeInfo = parent::sessionGet('post_type');
        $postTypeInfo = unserialize($postTypeInfo);
        $postPrice = $postTypeInfo['hazine'];
        $postTypeId = $postTypeInfo['id'];

        $user_id = parent::sessionGet('userId');

        $code = $data['off_code'];
        $darsad_code = $this->checkCode($code);
        $code_price = ($darsad_code * $basket_price) / 100;

        $amount = $basket_price - $basket_discount + $postPrice - $code_price;

        $pay_type = $data['pay_type'];
        if ($pay_type == 1) {
            $payment = new Payment;
            $description = 'خرید از پژوابوک';
            $result = $payment->zarinpalRequest($amount, $description, 'pejhvaman@gmail.com', $shomare_mobile);
            $status = $result['Status'];
            //$errors = $result['Errors'];
            $authority = $result['Authority'];
            if ($status == 100) {
                $sql = 'insert into tbl_order (esm_girande, shomare_mobile, kod_posti, ostan, shahr, adres_girande, sabad, amount, post_type, user_id, zarinpal_authority, vaziat_sefaresh) values (?,?,?,?,?,?,?,?,?,?,?,?)';
                $params = [$esm_girande, $shomare_mobile, $kod_posti, $ostan, $shahr, $adres_girande, $sabad, $amount, $postTypeId, $user_id, $authority, 1];
                $this->doQuery($sql, $params);
                header('location: https://www.zarinpal.com/pg/StartPay/' . $authority);
            } else {
                //echo $errors;
                header('location:' . URL . 'showcart2/index/' . $status);
            }
        }


    }
}