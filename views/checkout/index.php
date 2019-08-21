<style>
    .rahgiri {
        width: 91.55%;
        padding: 50px;
        float: right;
        font-family: sans;
    }

    .rahgiri > div {
        margin: auto;
    }

    .dashed {
        width: 65px;
        height: 2px;
        float: right;
    }

    .dashed span {
        display: block;
        width: 10px;
        height: 2px;
        margin-left: 5px;
        float: right;
        background: #67bfb0;
    }

    .dashed span:last-child {
        margin-left: 10px;
    }

    .steps {
        float: right;
        width: 345px;
        padding: 0;
    }

    .steps li {
        width: 150px;

        float: right;
        position: relative;
    }

    .steps li .circle {
        display: block;
        width: 25px;
        height: 25px;
        border-radius: 100%;
        border: 5px solid #e9e9e9;
        position: relative;
        top: -16px;
    }

    .steps li.done .circle {
        background: #67bfb0 url(public/images/tick1.png) no-repeat center !important;
        border: 5px solid #67bfb0 !important;
    }

    .steps li.doing .circle {
        border: 5px solid #67bfb0 !important;
    }

    .steps .line {
        display: block;
        float: left;
        margin: 0 15px 0 8px;
        width: 100px;
        height: 2px;
        background: #e9e9e9;
        position: relative;
        top: -34px;
    }

    .steps li.done .line {
        background: #67bfb0;
    }

    .steps .step_title {
        position: absolute;
        right: -12px;
        top: 20px;
        font-size: 10.5pt;
        color: #6f6f6f;
        width: 100px;
    }

    .steps li.done .step_title {
        color: #67bfb0;
    }

    .steps li.doing .step_title {
        color: #67bfb0;
    }

    #sabad i {
        display: block;
        width: 32px;
        height: 32px;
        float: right;
        background: url(public/images/credit-card.png) no-repeat center;
    }

    .right_side {
        width: 75%;
        float: right;
    }

    .editendelete {
        font-size: 16pt;
    }
</style>
<div class="rahgiri">
    <div>
        <div class="dashed" style="margin-right: 360px">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="steps">
            <li class="done">
                <span class="circle"></span>
                <span class="line"></span>
                <span class="step_title">
                                                     اطلاعات ارسال
                                                </span>
            </li>
            <li class="done">
                <span class="circle"></span>
                <span class="line"></span>
                <span class="step_title" style="right: 0">
                                                     پرداخت
                                                </span>
            </li>

            <li class="doing" style="width: 42px">
                <span class="circle"></span>
                <span class="step_title">
                                                     اتمام خرید و ارسال
                                                </span>
            </li>
        </ul>
        <div class="dashed">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<style>

    #sabad, #address {
        width: 100%;
        float: right;
        /*border: 1px solid #e9e9e9;*/
        font-family: sans;
        color: #6f6f6f;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    #sabad::after {
        content: '';
        clear: both;
        display: block;
    }

    #sabad table, #address table {
        background: white;
        width: 100%;
        margin: auto;
        border: 1px solid #e9e9e9;

    }

    #sabad table tr td:first-child {
        width: 45px;
    }

    #sabad table td,

    ,
    #address table td {
        height: 200px;

    }

    #sabad table tr:not(:first-child) td, #address table tr:not(:first-child) td {
        border-top: 1px solid #e9e9e9;
    }

    #sabad .right_img {
        width: 130px;
        height: 100%;
        float: right;
        vertical-align: middle;
    }

    #sabad .left_title {
        float: right;
        width: 230px;
        height: 100%;
        margin-right: 20px;
    }

    .left_title p:first-child {
        margin-top: 40px;
    }

    #sabad img {
        max-width: 130px;
        float: right;
        margin-top: 10px;
        margin-right: 20px;
        border-radius: 4px;
    }


    .one_price, .all_price {
        font-size: 13pt;
    }

    .error {
        border-radius: 4px;
        border: 1px solid indianred;
        text-align: center;
        width: 100%;
        font-family: sans;
        float: right;
        background: #eea2a6;
        color: white;
        font-size: 15pt;
        margin-bottom: 5px;
    }
</style>

<?php
//var_dump($data);
$orderInfo = $data['orderInfo'];
$basket = $orderInfo['sabad'];
$basket = unserialize($basket);
//print_r($basket);

$vaziat_pardakht = $orderInfo['vaziat_pardakht'];
$sabt_time = $orderInfo['sabt_time'];
//$sabt_time = intval($sabt_time);
$sabt_time = Model::jalaliToMiladi();
$sabt_time = time($sabt_time);
$gozashte = time() - $sabt_time;
$mohalt = mohlate_pardakht * 3600;

if ($gozashte > $mohalt) {

    ?>
    <div class="error">
        این سفارش منقضی شده است. مهلت پرداخت
        <?= mohlate_pardakht ?>
        ساعت می باشد.
    </div>
    <?php
}
?>
<div id="sabad">
    <table cellspacing="0" cellpadding="0">
        <?php
        $products = $basket;
        foreach ($products as $product) {
            ?>
            <tr>
                <td style="width: 380px">
                    <div class="right_img">
                        <img src="public/images/books/<?= $product['id'] ?>/book_100.jpg">
                    </div>
                    <div class="left_title">
                        <p>
                            <?= $product['esm'] ?>
                        </p>
                        <p>
                            <?= $product['nevisande'] ?>
                        </p>
                        <p>
                            <?= $product['entInfo']['nam'] ?>
                        </p>
                    </div>
                </td>


                <td class="one_price">
                    تعداد:
                    <br>
                    <?= $product['tedad'] ?>
                </td>

                <td class="one_price">
                    مبلغ واحد:
                    <br>
                    <?= $product['gheymat'] ?>
                </td>
                <td class="all_price">
                    مبلغ کل:
                    <br>
                    <?= $product['tedad'] * $product['gheymat']; ?>
                </td>
                <td class="all_price">
                    مبلغ کل با تخفیف:
                    <br>
                    <?= $product['tedad'] * $product['gheymat'] - ($product['tedad'] * ($product['gheymat'] * $product['takhfif'] / 100)); ?>
                </td>
                <!--<td class="all_price">
                    وضعیت خرید:
                    <br>
                    <?/*= $product['tedad'] * $product['gheymat'] - ($product['tedad'] * ($product['gheymat'] * $product['takhfif'] / 100)); */ ?>
                </td>-->
            </tr>
            <?php
        }
        ?>
    </table>

</div>
<style>
    .row {
        float: right;
        width: 98.5%;
        height: auto;
        margin: 5px auto;
        padding: 8px;
        background: #eeeeee;
        border-radius: 4px;
        overflow: hidden;
        border: 2px solid #d2d2d2;
        color: #6f6f6f;
        font-family: sans;
        position: relative;
    }

    .btnMain {
        display: block;
        border-radius: 4px;
        padding: 0 3px 0 3px;
        height: 32px;
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        line-height: 32px;
        font-size: 14pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
        float: left;
    }

    .btnMain:first-child {
        margin-right: 3px;
    }

    .btnMain:hover {
        background-color: #4d8f84;
    }

    .btn_for_pay {
        position: absolute;
        width: 350px;
        height: 38px;
        float: left;
        top: 3px;
        left: 3px;
    }
</style>
<div class="row">
    وضعیت پرداخت :
    <?php
    if ($vaziat_pardakht == 1) {
        echo "پرداخت شده";
    } else {
        if ($gozashte <= $mohalt) {
            echo "در انتظار پرداخت";
            ?>
            <div class="btn_for_pay">
                <a class="btnMain" href="checkout/payonline/<?= $orderInfo['id'] ?>">
                    پرداخت آنلاین
                </a>
                <a class="btnMain" href="checkout/creditcard/<?= $orderInfo['id'] ?>">
                    کارت به کارت
                </a>
            </div>

            <?php
        }else{
            echo 'منقضی شده';
        }
    }
    ?>
    <hr>
    <?php
    $post_type = $orderInfo['post_type'];
    if ($orderInfo != 0) {
        ?>
        روش ارسال :
        <?php

        if ($post_type == 1) {
            echo "پست پیشتاز";
        } elseif ($post_type == 2) {
            echo "پست سفارشی";
        }
    }
    ?>
    <hr>
    شماره پرداخت :
    <?php
    $shomare_pardakht = $orderInfo['zarinpal_authority'];
    if ($shomare_pardakht != '') {
        echo "{$shomare_pardakht}";
    } else {
        echo "x";
    }
    ?>
</div>
<style>
    #address table td {
        padding: 10px
    }

    #address table tr:first-child td:nth-child(2) {
        width: 400px;
    }

</style>
<div id="address">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="one_price">
                گیرنده :
                <br>
                <?= $orderInfo['esm_girande'] ?>
            </td>
            <td class="one_price">
                آدرس :
                <br>
                <p style="height: 80px;overflow: hidden">
                    <?= $orderInfo['adres_girande'] ?>
                </p>
            </td>
            <td class="one_price">
                شهر :
                <br>
                <?= $orderInfo['shahr'] ?>
            </td>
            <td class="one_price">
                استان :
                <br>
                <?= $orderInfo['ostan'] ?>
            </td>
            <td class="one_price">
                کد پستی :
                <br>
                <?= $orderInfo['kod_posti'] ?>
            </td>
            <td class="one_price">
                شماره تماس :
                <br>
                <?= $orderInfo['shomare_mobile'] ?>
            </td>
        </tr>
    </table>
</div>

