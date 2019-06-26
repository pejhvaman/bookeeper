<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>pejhvabook</title>
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/jquery.flipTimer.js"></script>
    <link href="public/css/flipTimer.css" rel="stylesheet">
</head>
<body style="margin: 0;background: #f5f5f5">
<style>
    @font-face {
        font-family: 'sans';
        src: url("public/font/Yekan.ttf") format('truetype'), url('public/font/Yekan.eot?#iefix') format('embedded-opentype');
    }

    div, a, p, span, ul, li {
        text-align: right;
        direction: rtl;
    }

    a {
        text-decoration: unset;
    }

    ul {
        margin: 0;
    }

    li {
        list-style: none
    }

    .sans {
        font-family: sans;
    }

    .fontssm {
        font-size: 9pt
    }

    .fontsm {
        font-size: 10pt
    }

    .fontmd {
        font-size: 12pt
    }

    .fontlg {
        font-size: 16pt
    }

    header {
        width: 100%;
        height: 80px;
        margin: 0 auto;
        background: white;
    }

    #header_top {
        width: 100%;
        float: left;
        height: 100%;
    }

    #header_top_left {
        float: left;
        width: 450px;
        height: 100%;
    }

    #header_top_right {
        float: right;
        width: 850px;
        height: 100%;
    }

    #header_top_left .left {
        float: left;
        width: 190px;
        height: 100%;
    }

    #header_top_left .left #shopbasket {
        float: left;
        width: 150px;
        height: 41px;
        border: 1px solid #67bfb0;
        border-radius: 5px;
        margin: 20px 0 0 32px;
        cursor: pointer;
    }

    #header_top_left .right {
        float: right;
        width: 235px;
        height: 100%;
        position: relative;
    }

    #basket_icon {
        display: block;
        width: 32px;
        height: 32px;
        float: right;
        background: url(public/images/shopping-cart.png) no-repeat center;
        margin-right: 9px;
        margin-top: 4px;
    }

    #basket_count {
        display: block;
        float: left;
        margin-left: 8px;
        margin-top: 6px;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        color: white;
        background: #67bfb0;
        text-align: center;
        line-height: 30px;
    }

    #basket_title {
        color: #67bfb0;
        font-size: 12pt;
        float: right;
        margin-right: 2px;
        line-height: 41px;
    }

    #login, #register {
        color: #6f6f6f;
    }

    #enter_site {
        float: left;
        width: 180px;
        text-align: center;
        height: 28px;
        margin-top: 27px;
        cursor: pointer;
        border-left: 1px solid #000;
    }

    #open_login {
        background: url(public/images/arrow-down-sign-to-navigate.png) no-repeat center;
        display: block;
        width: 16px;
        height: 16px;
        float: left;
        margin-left: 29px;
        margin-top: 7px;
    }

    #open_login_menu {
        float: left;
        width: 220px;
        text-align: center;
        height: 195px;
        position: absolute;
        background: white;
        border-top: 4px solid #e54a86;
        top: 60px;
        left: 0;
        z-index: 5;
        border-radius: 4px;
        box-shadow: 2px 2px 5px #cbcbcb;
        display: none;
    }

    #open_login_menu::before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 9px 12px 9px;
        border-color: transparent transparent #e54a86 transparent;

        position: relative;
        top: -33px;
        left: -72px;
    }

    .btn_main {
        display: block;
        width: 100px;
        height: 42px;
        border-radius: 6px;
        background: #67bfb0;
        text-align: center;
        color: white;
        font-family: sans;
        font-size: 16pt;
        cursor: pointer;
    }

    .font_gray {
        color: #6f6f6f;
    }

    .font_blue {
        color: #67bfb0;
    }

    #profile_icon {
        display: block;
        width: 32px;
        height: 32px;
        background: url(public/images/users.png) no-repeat center;
        float: right;
        margin-right: 20px;
        margin-top: 20px;
    }

</style>
<header>
    <div id="header_top">
        <div id="header_top_left">
            <div class="left">
                <a href="showcart" id="shopbasket">
                    <span id="basket_icon"></span>
                    <span id="basket_title" class="sans">سبد خرید</span>
                    <span id="basket_count" class="sans">0</span>
                </a>
            </div>
            <div class="right">
                <div id="enter_site" onclick="openLoginMenu(this)">
                    <span id="open_login"></span>
                    <a id="login" class="sans">ورود</a>
                    <span class="sans" style="color: #6f6f6f;font-size: 9pt">/</span>
                    <a id="register" class="sans">ثبت نام</a>
                </div>
                <div id="open_login_menu">

                        <a href="<?= URL ?>login" class="btn_main" style="margin: auto;width: 180px;line-height: 42px;">
                        ورود به پژوابوک
                        </a>
                    <div style="width: 100%;margin-top: 15px;text-align: center;border-bottom: 1px solid #ebebeb;height: 42px;">
                        <span class="sans font_gray fontmd">
                        کاربر جدید هستید؟
                        </span>
                        <a href="<?= URL ?>register" class="sans" style="color:#67bfb0 ;margin-right: 4px">
                            ثبت نام
                        </a>
                    </div>
                    <span id="profile_icon"></span>
                    <a href="public//login" class="sans font_gray fontlg"
                       style="float: right;margin-right: 8px;margin-top: 23px;">پروفایل</a>
                </div>
            </div>
        </div>

        <style>
            #logo {
                float: right;
                height: 100%;
                width: 100px;
                margin: 0 -8px 0 50px;
            }

            #logo_span {
                display: block;
                background: url(public/images/757cda6d9ac2a7f0db09c41b83931b53.jpg) no-repeat center;
                width: 180px;
                height: 75px;
            }

            #search {
                float: left;
                height: 100%;
                width: 590px;
                position: relative;
            }

            #search_input {
                width: 565px;
                height: 42px;
                float: left;
                vertical-align: middle;
                border: 1px solid #d5d5d5;
                border-radius: 8px;
                font-family: sans;
                font-size: 12pt;
                color: #969696;
                padding: 0 8px;
                margin-top: 17px;
                background: #e8e8e8;
            }

            #search_icon_back {
                display: block;
                width: 60px;
                height: 44px;
                background: #e54a86;
                position: absolute;
                left: 0;
                margin-top: 17px;
                border-radius: 8px 0 0 8px;
                cursor: pointer;
            }

            #search_icon {
                display: block;
                width: 32px;
                height: 32px;
                background: url(public/images/magnifying-glass.png) no-repeat center;
                position: absolute;
                top: 6px;
                left: 14px;
            }
        </style>

        <div id="header_top_right">
            <div id="logo">
                <a href="<?= URL ?>" id="logo_span"></a>
            </div>
            <div id="search">
                <input id="search_input" placeholder="نام کتاب، ناشر یا دسته ی مورد نظر خود را وارد کنید...">
                <span id="search_icon_back">
                    <span id="search_icon"></span>
                </span>

            </div>
        </div>
    </div>
</header>
<script>
    function openLoginMenu(tag) {
        var divTag = $(tag);
        divTag.parents('.right').find('#open_login_menu').fadeToggle();
    }
</script>
<style>
    nav {
        width: 100%;
        height: 42px;
        background: rgba(135, 42, 97, 0.75);
        border-bottom: 4px solid rgba(135, 42, 97, 0.91); /*d7e2eb*/
        font-family: sans;
        z-index: 4;
    }

    #menu_level1 {
        width: 1300px;
        padding: 0;
        margin: auto;
        position: relative;
    }

    #menu_level1 > li {
        float: right;
        line-height: 42px;
        width: 115px;
        color: white;
        cursor: pointer;
        text-align: center;
    }

    .border_transition {
        position: absolute;
        display: block;
        margin: auto;
        width: 10px;
        height: 4px;
        bottom: 0;

    }

    #menu_level1 > li.activeMenu {

    }

    /*#menu_level1 > li:hover {
        border-bottom: 4px solid #874356;
        box-shadow: 0 0 2px #874356;
    }*/

    .level2_content {
        width: 1300px;
        height: 400px;
        background: white;
        margin-top: 4px;
        box-shadow: 2px 2px 5px #cbcbcb;
        position: absolute;
        right: 0;
        display: none;
        z-index: 4;
    }

    .level2_content div:last-child {
        border-left: unset;
    }

    .sub_content {
        width: 311px;
        height: 100%;
        /*border-left: 1px solid #ebebeb;*/
        float: right;
    }

    .sub_content img {
        width: 220px;
        height: 293px;
        float: right;
        position: absolute;
        left: 20px;
        bottom: 20px;
        border-radius: 7px;
        overflow: hidden;
    }

    .menu_level2 {
        color: #6f6f6f;
        padding: unset;
        font-size: 11pt;
    }

    .menu_level2 li {
        color: #6f6f6f;
        padding-right: 20px;
        height: 25px;
    }

    /*.menu_level2 li:first-child {
        color: #67bfb0;
        padding-right: 10px !important;
    }*/
</style>

<nav>
    <ul id="menu_level1">
        <li data-time="1">
            <a>
                دسته بندی ها
            </a>
            <span class="border_transition"></span>
            <div class="level2_content">
                <div class="sub_content">
                    <ul class="menu_level2">
                        <li>فلسفی</li>
                        <li>
                            هنری و عکاسی
                        </li>
                        <li>
                            تاریخی
                        </li>
                        <li>
                            شعر
                        </li>
                        <li>
                            بیوگرافی
                        </li>
                        <li>
                            کودکان
                        </li>
                        <li>
                            علمی
                        </li>
                        <li>
                            نمایشنامه
                        </li>
                    </ul>
                </div>
                <div class="sub_content"></div>
                <div class="sub_content"></div>
                <div class="sub_content">
                    <img src="public/images/d2f1cd5e9bafed5e0e8218b29841b01f.jpg">
                </div>
            </div>

        </li>
        <li data-time="3">
            <a>
                نویسندگان
            </a>
            <div class="level2_content">
                <div class="sub_content">
                    <ul class="menu_level2">
                        <li>کافکا</li>
                        <li>آلبر کامو</li>
                        <li>ژان پل سارتر</li>
                    </ul>
                </div>
                <div class="sub_content"></div>
                <div class="sub_content"></div>
                <div class="sub_content">
                    <img src="public/images/0f70801c7c01b5a58a0537f4007a0666.jpg">
                </div>
            </div>
        </li>
    </ul>
</nav>
<script>
    var timer = {};

    $('#menu_level1 > li').hover(function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            tag.find('.level2_content').show();
            tag.css('border-bottom', '4px solid #e54a86');
            tag.css('box-shadow', '0 0 2px #581b40');
        }, 400);
    }, function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            tag.find('.level2_content').hide();
            tag.css('border-bottom', 'unset');
            tag.css('box-shadow', 'unset');
        }, 400);

    });
</script>

<style>
    #main {
        width: 1300px;
        margin: 20px auto;
    }

    #main::after {
        content: '';
        clear: both;
        display: block;
    }
</style>
<div id="main">