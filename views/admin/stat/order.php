<?php
$active_menu = 'stat';
require('views/admin/rightSide.php');
?>
<style>
    .leftSide {
        width: 1020px;
        float: left;
        background: #fff;
    }

    .menuContent {
        padding: 20px;
        width: 96%;
    }

    .menuContent a {
        text-decoration: none;
    }

    .row {
        width: 100%;
        float: right;
        padding: 15px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .row label {
        margin-right: 15px;
        font-size: 14pt;
    }

    .row .title {
        font-family: sans;
        font-size: 14pt;
        font-weight: bold;
    }

    .row .value {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14pt;
        font-weight: bold;

    }
    .menuTable {
        width: 100%;
        border: 1px solid #efefef;
        border-radius: 8px;
        margin-top: 40px;
    }

    .menuTable tr {
        text-align: center;
    }

    .menuTable tr td {
        padding: 10px;
        border-left: 1px solid #efefef;
        border-bottom: 1px solid #efefef;
    }

    .menuTable tr td:last-child {
        border-left: unset;
    }

    .menuTable tr:last-child td {
        border-bottom: unset;
    }

    .btn-pejhva-secondary {
        display: block;
        width: 98px;
        height: 38px;
        line-height: 40px;
        text-align: center;
        float: left;
        padding: 0 10px;
        background: white;
        border: 1px solid #cd9c00;
        border-radius: 4px;
        font-family: sans;
        font-size: 14pt;
        color: #3f3f3f;
        cursor: pointer;
        transition: 500ms;
        margin: 15px;
    }

    .btn-pejhva-secondary:hover {
        opacity: 0.7;
    }

    .row .btn-pejhva-secondary {

    }
</style>
<?php
$order_stat = $data['order_stat'];
$result = $order_stat['result'];
$result_num = sizeof($result);

?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            آمار سفارشات در بازه زمانی
            <?php
            echo $order_stat['start_date']
            ?>
            تا
            <?php
            echo $order_stat['end_date']
            ?>
        </h2>
        <hr>
        <div class="row">
            <div class="item">
                    <span class="title">
                    تعداد کل سفارشات :
                </span>
                <span class="value">
                    <?= $result_num ?>
                </span>
            </div>

            <div class="item">
                    <span class="title">
                    تعداد سفارشات پرداخت شده :
                </span>
                <span class="value">
                    <?= $order_stat['paid_order'];  ?>
                </span>
            </div>
            <div class="item">
                    <span class="title">
                    درصد سفارشات پرداخت شده :
                </span>
                <span class="value">
                    <?php
                    $darsad_paid = ($order_stat['paid_order']/$result_num)*100;
                    echo $darsad_paid .'%';
                    ?>
                </span>
            </div>
            <div class="item">
                    <span class="title">
                    مبلغ کل فروش :
                </span>
                <span class="value">
                    <?= number_format($order_stat['amount_all']);  ?>
                    <span style="font-family: sans">تومان</span>
                </span>
            </div>
        </div>
        <div class="row">
            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>کد</td>
                    <td>تاریخ ثبت</td>
                    <td>نام گیرنده</td>
                    <td>مبلغ کل</td>
                    <td>استان</td>
                    <td>شهر</td>
                </tr>
                <?php
                foreach ($result as $key => $order) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $order['id'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $order['sabt_time'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $order['esm_girande'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo number_format($order['amount']);
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $order['ostan'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $order['shahr'];
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </div>
        <div class="row">
            <a href="adminstat/index" class="btn-pejhva-secondary">
                بازگشت
            </a>
        </div>
    </div>
</div