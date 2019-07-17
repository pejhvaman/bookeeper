<?php
$active_menu = 'order';
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

    .selectTik {
        position: relative;
        text-align: center;
    }

    .addBtn, .deleteBtn {
        float: left;
        padding: 5px 15px;
        text-align: center;
        color: white;
        margin: 15px 20px 15px 0;
        border-radius: 8px;
        transition: 0.08s;
    }

    .addBtn:hover {
        opacity: .7;
    }

    .deleteBtn {
        background: #ef5343;
        cursor: pointer;
    }

    .addBtn {
        background: #67bfb0;
    }

    .deleteBtn:hover {
        opacity: .7;
    }

    .tdvaled {
        position: relative;
    }

    .detailIcon {
        display: block;
        width: 24px;
        height: 24px;
        background: url(public/images/editadmin.png) no-repeat center;
        right: 35%;
        position: absolute;
        transform: translate(-50%, -50%);
    }

    .detailIcon:hover {
        opacity: .6;
    }

    .dirIcon {
        display: inline-block;
        width: 16px;
        height: 16px;
        background: url(public/images/chevron-sign-left.png) no-repeat center;
    }

    .pathLinks:visited {
        color: unset;
    }

    .viewproperty {
        display: block;
        width: 24px;
        height: 24px;
        background: url(public/images/property.png) no-repeat center;
        right: 35%;
        position: absolute;
        transform: translate(-50%, -50%);
    }
    .viewproperty:hover{
        opacity: .6;
    }
</style>
<?php
$orders = $data['orders'];
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            مدیریت سفارشات
        </h2>

        <hr>
        <a onclick="submitForm();" class="deleteBtn">
            حذف
        </a>
        <form action="adminproduct/deleteproduct" method="post">

            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>کد</td>
                    <td>تاریخ ثبت</td>
                    <td>نام گیرنده</td>
                    <td>مبلغ کل</td>
                    <td>استان</td>
                    <td>شهر</td>
                    <td>جزئیات</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($orders as $key => $order) {
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
                        <td class="tdvaled">
                            <a href="adminorder/detail/<?= $order['id'] ?>">
                                <i class="detailIcon"></i>
                            </a>
                        </td>
                        <td class="selectTik">
                            <input name="ids[]" value="<?= $order['id'] ?>" type="checkbox">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>

        <script>
            function submitForm() {
                $('form').submit();
            }

            /*$('.selectTik').click(function () {
                $(this).find('.checkBoxManual').toggleClass('selectCheck');
            });*/
        </script>
    </div>
</div>