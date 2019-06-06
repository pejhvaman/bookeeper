<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="public/js/jquery-3.3.1.min.js"></script>
</head>
<body style="background: #f5f5f5;margin: 0;">
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

    .sans {
        font-family: sans; /*andaze font bozorgtar az sans va tehran ast...*/
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

    #reg_win {
        width: 385px;
        height: 450px;
        margin: auto;
        margin-top: 80px;
        border: 1px solid #dcdcdc;
        background: white;
        font-family: sans;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    #reg_win:after {
        content: '';
        clear: both;
        display: block;
    }

    #reg_win .title_div {
        width: 100%;
        height: 56px;
        float: right;
    }

    #reg_win .title {
        margin: 0;
        font-size: 16pt;
        color: #595959;
        padding-right: 35px;
        line-height: 56px;
        border-bottom: 1px solid #e2e2e2;
    }

    .emialOrTel, #emialOrTel {
        width: 100%;
        height: 87px;
        float: right;
        margin-top: 10px;
        position: relative;
    }

    label {
        font-size: 13pt;
        color: #6f6f6f;
        margin-right: 30px;
        margin-bottom: 10px;
        float: right;
    }

    .emialOrTel input[type=text], .emialOrTel input[type=password] {
        direction: rtl;
        padding-left: 8px;
        border: 1px solid #c7c7c7;
        border-radius: 5px;
        width: 265px;
        height: 42px;
        margin-right: 30px;
        color: #9f9f9f;
        font-family: sans;
        font-size: 9.5pt;
        padding-right: 50px;
    }

    .emialOrTel input[type=text]:focus {
        border: 1px solid black;
    }

    .emialOrTel input[type=password]:focus {
        border: 1px solid black;
    }

    .email_icon {
        display: block;
        width: 46px;
        height: 46px;
        position: absolute;

        right: 30px;
        top: 38px;
    }

    .btnMain {
        display: block;
        border-radius: 8px;
        width: 323px;
        height: 52px;
        margin-right: 30px;
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        line-height: 52px;
        font-size: 16pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
    }

    .btnMain:hover {
        background-color: #4d8f84;
    }

    #emialOrTel input[type=checkbox] {
        float: right;
        margin-right: 30px;
        margin-top: 10px;
        width: 25px;
        height: 25px;
        cursor: pointer;
        opacity: 0;
    }

    #instead_check {
        display: block;
        width: 25px;
        height: 25px;
        border-radius: 7px;
        border: 1px solid #4d8f84;
        margin-right: 30px;
        margin-top: 10px;
    }

    .checked {
        background: #67bfb0 url(public/images/check-mark.png) no-repeat center !important;
    }

    #emialOrTel {
        position: relative;
        border-bottom: 1px solid #e2e2e2;
    }

    #emialOrTel p {
        float: right;
        margin: 0;
        position: absolute;
        right: 65px;
        top: 64px;
        color: #6f6f6f;
    }

    #newyou {
        height: 84px;
        background: #f5f5f5;
        float: right;
        width: 100%;
        text-align: center;
    }

    #newyou p {
        margin: 0;
        display: inline-block;
        color: #6f6f6f;
        margin-top: 28px;
        font-size: 14pt;
    }

    #newyou a {
        color: #67bfb0;
        cursor: pointer;
        font-size: 14pt;
    }
</style>
<form action="login/checkuser" method="post">
    <div id="reg_win">
        <div class="title_div">
            <p class="title">
                ورود به پژوابوک
            </p>
        </div>
        <div class="emialOrTel">
            <label>
                ایمیل
            </label>
            <input name="email" placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید" type="text">
            <i class="email_icon" style="background: url(public/images/avatar.png) no-repeat center;"></i>
        </div>
        <div class="emialOrTel">
            <label>
                رمز عبور
            </label>
            <input name="ramz" type="password">
            <i class="email_icon" style="background: url(public/images/password.png) no-repeat center;"></i>
        </div>
        <div id="emialOrTel" style="height: 105px">
        <span onclick="submitLoginForm()" class="btnMain">
            ورود به پژوابوک
        </span>
            <input class="real_checkbox" type="checkbox">
            <span id="instead_check"></span>
            <p>
                مرا به خاطر داشته باش
            </p>
        </div>
        <div id="newyou">
            <p>
                کاربر جدید هستید؟
            </p>
            <a>
                ثبت نام در پژوابوک
            </a>
        </div>

    </div>
</form>
<script>
    function submitLoginForm() {
        $('form').submit();
    }

    $('.real_checkbox').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('#emialOrTel').find('#instead_check').addClass('checked');
        } else {
            $(this).parents('#emialOrTel').find('#instead_check').removeClass('checked');
        }
    });
</script>
</body>
</html>