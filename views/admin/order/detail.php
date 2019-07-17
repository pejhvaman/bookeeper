<style>
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

    #title_header {
        color: #404040;
        font-family: sans;
        display: inline-block;
        margin-bottom: 0;
    }

    .row {
        float: right;
        width: 98.5%;
        height: auto;
        margin: 5px auto;
        padding: 8px;
        /*background: #eeeeee;*/
        border-radius: 4px;
        overflow: hidden;
        /*border: 2px solid #d2d2d2;*/
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
    #address table td {
        padding: 10px
    }

    #address table tr:first-child td:nth-child(2) {
        width: 30%;
    }

    .one_price input[type=text] {
        border: 1px solid #7a7a7a;
        border-radius: 4px;
        padding: 4px;
    }
    #address_input{
        width: 90%;
    }

    .btn-pejhva-primary {
        display: block;
        width: 100px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        float: left;
        padding: 0 10px;
        background: #00b189;
        border-radius: 4px;
        font-family: sans;
        font-size: 14pt;
        color: whitesmoke;
        cursor: pointer;
        transition: 500ms;
        margin: 15px;
    }

    .btn-pejhva-primary:hover {
        opacity: 0.7;
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
        border: 1px solid #9a9a9a;
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
</style>

<?php
//var_dump($data);
$orderInfo = $data['orderInfo'];
$basket = $orderInfo['sabad'];
$basket = unserialize($basket);
//print_r($basket);

$vaziat_pardakht = $orderInfo['vaziat_pardakht'];
$sabt_time = $orderInfo['sabt_time'];
$sabt_time = intval($sabt_time);
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

<div class="row">
    <h2 id="title_header">
        جزئیات محصول با کد
        <?= $orderInfo['id'] ?>
    </h2>
    <a href="adminorder/showfactor/<?= $orderInfo['id'] ?>" class="btn-pejhva-primary" style="background: #545bb7">
        فاکتور
    </a>
</div>
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
        } else {
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
<form id="order_info_form" action="adminorder/changeorderinfo/<?= $orderInfo['id'] ?>" method="post">
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
                    <input name="address" id="address_input" type="text" value="<?= $orderInfo['adres_girande'] ?>">
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
                    <input name="code_posti" type="text" value="<?= $orderInfo['kod_posti'] ?>">
                </td>
                <td class="one_price">
                    شماره تماس :
                    <br>
                    <input name="mobile" type="text" value="<?= $orderInfo['shomare_mobile'] ?>">
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <a href="adminorder/index" class="btn-pejhva-secondary">
            بازگشت
        </a>
        <span onclick="submitOrderInfoForm()" class="btn-pejhva-primary">
            ثبت
        </span>
    </div>
</form>

<script>
    function submitOrderInfoForm() {
        $('#order_info_form').submit();
    }
</script>

