<?php

class model_adminstat extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function compareDates($date1, $date2)
    {
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);

        $date1 = $date1->format('Y-m-d');
        $date2 = $date2->format('Y-m-d');

        if ($date1 > $date2) {
            return 1;
        }
        if ($date1 == $date2) {
            return 2;
        }
        if ($date1 < $date2) {
            return 3;
        }
    }

    function order($data)
    {
        $start_day = $data['start_day'];
        $start_month = $data['start_month'];
        $start_year = $data['start_year'];
        $end_day = $data['end_day'];
        $end_month = $data['end_month'];
        $end_year = $data['end_year'];

        $start_date = $start_year . '/' . $start_month . '/' . $start_day;
        $end_date = $end_year . '/' . $end_month . '/' . $end_day;


        $sql = "select * from tbl_order";
        $result = $this->doSelect($sql);
        $res_total = [];
        $paid_order = 0;
        $amount_total = 0;
        foreach ($result as $item) {
            $sabt_time = $item['sabt_time'];
            $compare1 = $this->compareDates($sabt_time, $start_date);
            $compare2 = $this->compareDates($sabt_time, $end_date);

            if (($compare1 == 1 or $compare1 == 2) and ($compare2 == 3 or $compare2 == 2)) {
                array_push($res_total, $item);
                if ($item['vaziat_pardakht'] == 1) {
                    $paid_order++;
                }
                $amount_total += $item['amount'];
            }
        }
        return ['result' => $res_total, 'paid_order' => $paid_order, 'amount_all' => $amount_total, 'start_date' => $start_date, 'end_date' => $end_date];
    }
}

?>