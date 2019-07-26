<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getSlider1()
    {
        $sql = 'select * from tbl_slider1';
        $results = $this->doSelect($sql);
        return $results;
    }

    function getSlider2()
    {
        $sql = 'select * from tbl_books where vijhe=?';
        $result = $this->doSelect($sql, [1]);
        foreach ($result as $key => $row) {
            $sql = "select * from tbl_entesharat where id=?";
            $nasher = $this->doSelect($sql, [$row['identesharat']], 1);
            $nasherName = $nasher['nam'];
            $total_price = $this->calculateDiscount($row['gheymat'], $row['takhfif'])[1];
            $result[$key]['total_price'] = $total_price;
            $result[$key]['nasher'] = $nasherName;
        }

        $firstRow = $result[0]; //why first row? har kudum zamane_vijhe khodeshuno daran!!!
        //MANZUR AZ zamane_vijhe HAMAN ZAMANR SHURUE TAKHFIF VIJHE AST...
        $specialTime = $firstRow['zamane_vijhe'];

        ///inja az Model::getOption estefadekon
        $sql = 'select * from tbl_option where setting="special_time"';
        $result2 = $this->doSelect($sql, [], 1);
        $special_duration = $result2['value'] * 3600;

        $end_time = $specialTime + $special_duration;
        date_default_timezone_set('Asia/Tehran');
        $end_date = date('F d,Y H:i:s', $end_time);
        return [$result, $end_date];
    }

    function getScrollSlider1()
    {
        $options = Model::getOptions();
        $limit = $options['limit_scrollSlider'];
        $sql = "select * from tbl_books where scrollslider1=? limit " . $limit . " ";
        $result = $this->doSelect($sql, [1]);
        return $result;
    }

}