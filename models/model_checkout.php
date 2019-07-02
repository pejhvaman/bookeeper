<?php
class model_checkout extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkoutZarinpal($data)
    {
        $Status = $data['Status'];
        $Authority = $data['Authority'];
        $sql = "select * from tbl_order where zarinpal_authority=?";
        $result = $this->doSelect($sql, [$Authority],1);
        $Amount = $result['amount'];
        $Payment = new Payment;
        $result = $Payment->zarinpalVerify($Authority, $Amount);
        $Status = $result['Status'];
        $ErrorsArray =zarinpalErrors;
        $Error = $ErrorsArray[$Status];
        $RefID = $result['RefID'];
        if($Status == 100){
            $sql = "update tbl_order set vaziat_pardakht=1, zarinpal_refid=? where zarinpal_authority=?";
            $this->doQuery($sql,[$RefID, $Authority]);
        }
        $sql = "select * from tbl_order where zarinpal_authority=?";
        $result = $this->doSelect($sql, [$Authority]);
        return $result;
    }
}