<?php

class model_admindashboard extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getRange($first_date, $last_date)
    {
        $dates = [];
        $current_time = strtotime($first_date);
        $last_time = strtotime($last_date);

        while ($current_time <= $last_time) {
            $dates[] = date('Y/m/d', $current_time);
            $current_time = strtotime('+1 day', $current_time);
        }

        return $dates;
    }

    function getOrders()
    {
        $sql = "select * from tbl_order";
        $res = $this->doSelect($sql);
        return $res;
    }

    function getStat()
    {
        $today_date = date('Y/m/d');
        $time = time();
        $last_week_time = $time - (7 * 24 * 3600);
        $last_week_date = date('Y/m/d', $last_week_time);
        $dates = $this->getRange($last_week_date, $today_date);
        $orders = $this->getOrders();

        $order_stat = [];

        foreach ($dates as $date) {
            $jalali_date = Model::miladiToJalali($date);
            $order_stat[$jalali_date] = 0;
        }

        foreach ($orders as $order) {
            $sabt_date_jalali = $order['sabt_time'];
            $sabt_date_miladi = Model::jalaliToMiladi($sabt_date_jalali);
            if (in_array($sabt_date_miladi,$dates)) {
                $order_stat[$sabt_date_jalali] = $order_stat[$sabt_date_jalali] + 1;
            }
        }

        return $order_stat;
    }
}

?>