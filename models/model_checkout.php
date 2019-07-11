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
        $result = $this->doSelect($sql, [$Authority], 1);
        $Amount = $result['amount'];
        $Payment = new Payment;
        $result = $Payment->zarinpalVerify($Authority, $Amount);
        $Status = $result['Status'];
        $ErrorsArray = zarinpalErrors;
        //echo "<h1>'$Status'</h1>";
        $Error = $ErrorsArray[$Status];
        $RefID = $result['RefID'];
        if ($Status == 100) {
            $sql = "update tbl_order set vaziat_pardakht=1, zarinpal_refid=? where zarinpal_authority=?";
            $this->doQuery($sql, [$RefID, $Authority]);
        }
        $sql = "select * from tbl_order where zarinpal_authority=?";
        $result = $this->doSelect($sql, [$Authority], 1);
        return $result;
    }

    function getOrderInfo($order_id)
    {
        $sql = "select * from tbl_order where id=?";
        $result = $this->doSelect($sql, [$order_id], 1);
        return $result;
    }

    function payOnline($order_id)
    {
        $order_info = $this->getOrderInfo($order_id);
        $pay_type = $order_info['pay_type'];
        if($pay_type ==2){
            $sql = "update tbl_order set pay_type=1 where id=?";
            $this->doQuery($sql, [$order_id]);
        }
        if ($pay_type == 1) {
            $Amount = $order_info['amount'];
            $Description = "خرید از پژوا بوک";
            $Email = "pejhvaman@gmail.com";
            $Mobile = $order_info['shomare_mobile'];
            $Payment = new Payment;
            $result = $Payment->zarinpalRequest($Amount, $Description, $Email, $Mobile);
            $Status = $result['Status'];
            $authority = $result['authority'];
            $Error = $result['Error'];
            if ($Status == 100) {
                header('location: https://www.zarinpal.com/pg/StartPay/' . $authority);
            } else {
                header('location:' . URL . 'checkout/showerror?error=' . $Error . '&order_id=' . $order_info['id']);
            }
        }//zarinpal
    }

    function updateCreditCard($data, $order_id)
    {
        $day = $data['day'];
        $month = $data['month'];
        $year = $data['year'];
        $hour = $data['hour'];
        $minute = $data['minute'];
        $shomare_card = $data['card_num'];
        $bank_name = $data['bank_name'];

        $sql = "update tbl_order set pay_day=?, pay_month=?, pay_year=?, pay_hour=?, pay_minute=?, shomare_card=?, bank_name=?, pay_type=2 where id=?";
        $params = [$day, $month, $year, $hour, $minute, $shomare_card, $bank_name, $order_id];
        $this->doQuery($sql,$params);
    }
}