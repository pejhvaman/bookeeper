<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>فاکتور</title>
</head>
<body>
<style>
    @font-face {
        font-family: 'yekan';
        src: url("public/font/Yekan.ttf") format('truetype'), url('public/font/Yekan.eot?#iefix') format('embedded-opentype');
    }

    body {
        direction: rtl;
    }

    #factor {
        width: 40%;
        border: 1px solid black;
    }

    #factor > tbody > tr {
        width: 100%;
    }

    #factor > tbody > tr > td {
        width: 100%;
    }

    #factor > tbody > tr > td > #first_row, #factor > tbody > tr > td > #second_row, #factor > tbody > tr > td > #third_row, #factor > tbody > tr > td > #fourth_row, #factor > tbody > tr > td > #fifth_row {
        width: 100%;
    }

    #factor > tbody > tr > td > #first_row > tbody > tr, #factor > tbody > tr > td > #second_row > tbody > tr, #factor > tbody > tr > td > #third_row > tbody > tr, #factor > tbody > tr > td > #fourth_row > tbody > tr, #factor > tbody > tr > td > #fifth_row > tbody > tr {
        width: 100%;
    }

    #factor > tbody > tr > td > #first_row > tbody > tr > td {
        font-family: yekan;
        width: 33%;
        text-align: center;
        padding: 4px;
    }

    #factor > tbody > tr > td > #second_row > tbody > tr > td {
        width: 50%;
        font-family: yekan;
        text-align: center;
        padding: 4px;
    }

    #factor > tbody > tr > td > #third_row > tbody > tr > td {
        width: 14.28%;
        font-family: yekan;
        text-align: center;
        padding: 4px;
    }

    #factor > tbody > tr > td > #fourth_row > tbody > tr > td {
        width: 33.33%;
        font-family: yekan;
        text-align: center;
        padding: 4px;
    }
    #factor > tbody > tr > td > #fifth_row > tbody > tr > td {
        width:100%;
        font-family: yekan;
        text-align: left;
        padding: 4px;
    }

    .border_left {
        border-left: 1px solid black;
    }

    .border_bottom {
        border-bottom: 1px solid black;
    }

    #site_title {
        font-size: 20pt;
    }

    .header_title {
        font-size: 14pt;
        font-weight: bold;
    }
    #fifth_row img{
        max-width: 40%;
        max-height: 100px;
    }
</style>
<?php
$orderInfo = $data['orderInfo'];
$basket = $orderInfo['sabad'];
$basket = unserialize($basket);
?>
<table id="factor" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td>
            <table id="first_row" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="border_bottom">
                        <img src="public/images/757cda6d9ac2a7f0db09c41b83931b53.jpg" alt="">
                    </td>
                    <td class="border_bottom">
                       <span id="site_title">
                           پژوامن
                       </span>
                    </td>
                    <td class="border_bottom">
                        <?php
                        require('public/barcode/BarcodeGenerator.php');
                        require('public/barcode/BarcodeGeneratorHTML.php');
                        require('public/barcode/BarcodeGeneratorJPG.php');
                        require('public/barcode/BarcodeGeneratorPNG.php');
                        require('public/barcode/BarcodeGeneratorSVG.php');

                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $barcode = $generator->getBarcode($orderInfo['id'], $generator::TYPE_CODE_128);
                        echo '<img src="data:image/png;base64,' . base64_encode($barcode) . '">';
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table id="second_row" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="border_left border_bottom">
                        <span class="header_title">
                            گیرنده:
                        </span>
                        <?= $orderInfo['esm_girande'] ?>
                        <hr>
                        <span class="header_title">
                            آدرس:
                        </span>
                        <?= $orderInfo['adres_girande'] ?>
                    </td>
                    <td class="border_bottom">
                        <span class="header_title">
                            کد پستی:
                        </span>
                        <?= $orderInfo['kod_posti'] ?>
                        <hr>
                        <span class="header_title">
                            موبایل:
                        </span>
                        <?= $orderInfo['shomare_mobile'] ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table id="third_row" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="border_left border_bottom">
                        نام کتاب
                    </td>
                    <td class="border_left border_bottom">
                        نویسنده
                    </td>
                    <td class="border_left border_bottom">
                        انتشارات
                    </td>
                    <td class="border_left border_bottom">
                        تعداد
                    </td>
                    <td class="border_left border_bottom">
                        قیمت واحد
                    </td>
                    <td class="border_left border_bottom">
                        قیمت کل
                    </td>
                    <td class="border_bottom">
                        قیمت کل با تخفیف
                    </td>
                </tr>
                <?php
                foreach ($basket as $item) {
                    ?>
                    <tr>
                        <td class="border_left border_bottom">
                            <?= $item['esm'] ?>
                        </td>
                        <td class="border_left border_bottom">
                            <?= $item['nevisande'] ?>
                        </td>
                        <td class="border_left border_bottom">
                            <?= $item['entInfo']['nam'] ?>
                        </td>
                        <td class="border_left border_bottom">
                            <?= $item['tedad'] ?>
                        </td>
                        <td class="border_left border_bottom">
                            <?= number_format($item['gheymat']) ?>
                        </td>
                        <td class="border_left border_bottom">
                            <?= number_format($item['tedad'] * $item['gheymat']) ?>
                        </td>
                        <td class="border_bottom">
                            <?= number_format($item['tedad'] * $item['gheymat'] - ($item['tedad'] * ($item['gheymat'] * $item['takhfif'] / 100))) ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table id="fourth_row" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="border_bottom">
                        <span class="header_title">
                            مبلغ پرداختی:
                        </span>
                        <?php
                        echo number_format($orderInfo['amount']);
                        ?>
                    </td>
                    <td class="border_bottom">
                        <span class="header_title">
                            شیوه پرداخت:
                        </span>
                        <?= $orderInfo['payType'] ?>
                    </td>
                    <td class="border_bottom">
                        <span class="header_title">
                            شیوه ارسال:
                        </span>
                        <?= $orderInfo['postType'] ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table id="fifth_row" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td height="100">
                        <img src="" alt="">
                        مهر فروشگاه
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>