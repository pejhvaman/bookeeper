<?php
$active_menu = 'setting';
require('views/admin/rightSide.php');
?>
<script src="public/jscolor/jscolor.js"></script>
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

    .menuTable tr td:first-child {
        width: 10%;
    }

    .menuTable tr td:nth-child(2) {
        width: 15%;

    }

    .menuTable tr td:nth-child(3) {
        width: 20%;
    }

    .menuTable tr td:last-child {
        width: 5%;
    }

    .menuTable tr td:last-child {
        border-left: unset;
    }

    .menuTable tr:last-child td {
        border-bottom: unset;
    }

    .deleteBtn {
        float: left;
        padding: 5px 15px;
        text-align: center;
        color: white;
        border-radius: 8px;
        transition: 0.08s;
        background: #ef5343;
        cursor: pointer;
    }

    .deleteBtn:hover {
        opacity: .7;
    }

    .row {
        width: 100%;
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .row * {
        margin: 4px;
    }

    .row .title{
        font-size: 14pt;
    }
    .row .value{
        width: 30%;
    }
    .row .value input{
        width: 100%;
        border-radius: 4px;
        padding: 4px;
        border: 1px solid #828282;
        color: #535353;
        direction: ltr;
        text-align: left;
    }

    #setting_form {
        display: flex;
        flex-wrap: wrap;
    }
    .row a{
        width: 100px;
    }

    .row .action {
        font-size: 12pt;
        background: unset;
        border: 1px solid #00b189;
        color: #535353;
    }

    .row .sabt {
        width: 100px;
    }
</style>
<?php
$options = Model::getOptions();
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            مدیریت تنظیمات
        </h2>
        <hr>
        <form id="setting_form" action="adminsetting/savesetting" method="post">
            <div class="row">
                <span class="title">
                    تعداد محصولات در اسکرول اسلایدر
                </span>
                <span class="value">
                    <input type="text" name="limit_scrollSlider" value="<?= $options['limit_scrollSlider'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    مهلت تخفیف ویژه(روز)
                </span>
                <span class="value">
                    <input type="text" name="special_time" value="<?= $options['special_time'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    شماره تماس
                </span>
                <span class="value">
                    <input type="text" name="tel" value="<?= $options['tel'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    ایمیل
                </span>
                <span class="value">
                    <input type="text" name="email" value="<?= $options['email'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    مهلت پرداخت(ساعت)
                </span>
                <span class="value">
                    <input type="text" name="mohlate_pardakht" value="<?= $options['mohlate_pardakht'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    روت سایت
                </span>
                <span class="value">
                    <input type="text" name="root" value="<?= $options['root'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    کد درگاه زرین پال
                </span>
                <span class="value">
                    <input type="text" name="zarinpalMID" value="<?= $options['zarinpalMID'] ?>">
                </span>
            </div>
            <div class="row">
                <span class="title">
                    رنگ بدنه
                </span>
                <span class="value">
                    <input id="body_color" class="jscolor" type="text" name="body_color" value="<?= $options['body_color'] ?>">
                </span>
                <span class="action btn-pejhva-primary" onclick="document.getElementById('body_color').jscolor.show()">
                    انتخاب
                </span>
            </div>
            <div class="row">
                <span class="title">
                    رنگ منو
                </span>
                <span class="value">
                    <input id="menu_color" class="jscolor" type="text" name="menu_color" value="<?= $options['menu_color'] ?>">
                </span>
                <span class="action btn-pejhva-primary" onclick="document.getElementById('menu_color').jscolor.show()">
                    انتخاب
                </span>
            </div>
            <div class="row">
                <span class="sabt btn-pejhva-primary" onclick="submitSettingForm()">
                    ثبت
                </span>
            </div>
        </form>
        <script>
            function submitSettingForm() {
                $('#setting_form').submit();
            }

            var bodyinputid = $('#body_color') //save some resources by not duplicating the selector
            bodyinputid.val('+<?= $options['body_color'] ?>+'); //set the value
            bodyinputid.css('background-color', '#yourcolor'); //set the background color


            var menuinputid = $('#menu_color') //save some resources by not duplicating the selector
            menuinputid.val('+<?= $options['menu_color'] ?>+'); //set the value
            menuinputid.css('background-color', '#yourcolor'); //set the background color
        </script>
    </div>
</div>


