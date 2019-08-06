</div>

<style>
    footer {
        width: 100%;
        height: 253px;
        float: right;
        font-family: sans;
        background: #eceff1;
        margin-top: 20px;
    }

    .footer_h {
        width: 100%;
        height: 52px;
        float: right;
        background: #eceff1;
        border-top: 1px solid #d7dadc;
    }

    .footer_h .email, .footer_h .tel {
        float: right;
        font-size: 12pt;
        color: #6f6f6f;
        margin-left: 15px;
        line-height: 52px;
    }

    .footer_h p {
        margin: 0;
        float: right;
        color: #6f6f6f;
        font-size: 12pt;
        margin-left: 40px;
        line-height: 52px;
    }

    .footer_h div {
        width: 1300px;
        height: 100%;
        margin: auto;
        border-bottom: 1px solid #d7dadc;

    }

    .footer_c {
        width: 1300px;
        height: 200px;
        margin: auto;
        margin-top: 53px;
        color: #6f6f6f;
    }

    .footer_c::before {
        content: '';
        clear: both;
        display: block;
    }

    .footer_cr {
        width: 680px;
        height: 100%;
        float: right;
    }

    .footer_c ul {
        width: 300px;
        height: 150px;
        float: right;
        padding: 0;
        margin-top: 40px;
        margin-right: 40px;
    }

    .footer_c ul li {
        width: 100%;
        height: 30px;
        font-size: 11pt;
        margin-right: 20px;
    }

    .footer_c ul li:first-child {
        font-size: 13pt;
        color: #575757;
    }

</style>
<footer>
    <?php
    $options = Model::getOptions();
    ?>
    <div class="footer_h">
        <div>
        <span class="email" style="padding-right: 20px">
            آدرس ایمیل :
        </span>
            <p>
                <?= $options['email'] ?>
            </p>
            <span class="tel">
            شماره تماس :
        </span>
            <p>
                <?= $options['tel'] ?>
            </p>
            <p style="float: left">
                7 روز هفته، 24 ساعته در خدمت شما هستیم.
            </p>
        </div>

    </div>
    <div class="footer_c">
        <div class="footer_cr">
            <ul>
                <li>
                    <a>
                        راهنمای خرید از سایت
                    </a>
                </li>
                <li>
                    <a>
                        نحوه ثبت سفارش
                    </a>
                </li>
                <li>
                    <a>
                        رویه ارسال سفارش
                    </a>
                </li>
                <li>
                    <a>
                        شیوه های پرداخت
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a>
                        راهنمای پنل کاربری
                    </a>
                </li>
                <li>
                    <a>
                        درج نظرات
                    </a>
                </li>
                <li>
                    <a>
                        آپلود تصاویر
                    </a>
                </li>
                <li>
                    <a>
                        نکات امنیتی
                    </a>
                </li>
            </ul>
        </div>
        <style>
            .footer_cl {
                float: left;
                height: 100%;
                width: 600px;
            }

            .recieve_email {
                width: 400px;
                height: 100px;
                float: left;
                position: relative;
            }

            .recieve_email span {
                display: block;
                margin-top: 30px;

            }

            .recieve_email input {
                float: right;
                width: 330px;
                height: 36px;
                border: 1px solid #d5d5d5;
                border-radius: 5px;
                padding-right: 8px;

            }

            .recieve_email .sendBtn {
                height: 39px;
                width: 75px;
                background: #67bfb0;
                position: absolute;
                left: 59px;
                border-radius: 5px 0 0 5px;
                line-height: 36px;
                text-align: center;
                color: white;
                margin: 0;
                cursor: pointer;
                transition: background-color 300ms ease;
            }

            .sendBtn:hover {
                background: #559d90;
            }

            .site_social {
                width: 400px;
                height: 100px;
                float: left;
                text-align: center;
                position: relative;
            }

            .site_social i {
                display: block;
                width: 32px;
                height: 32px;
                margin-right: 10px;
                margin-top: 37px;
                float: left;
                cursor: pointer;
            }

            .site_social i:first-child {
                margin-left: 165px;
            }
        </style>
        <div class="footer_cl">
            <div class="recieve_email">
                <span>
                    برای اطلاع از خبرهای سایت ایمیل خود را وارد کنید :
                </span>
                <input>
                <span class="sendBtn">
                        ارسال
                </span>
            </div>
            <div class="site_social">
                <i class="instagram" style="background: url(public/images/instagram.png) no-repeat center"></i>
                <i class="twitter" style="background: url(public/images/twitter.png) no-repeat center"></i>
                <i class="telegram" style="background: url(public/images/telegram.png) no-repeat center"></i>
            </div>
        </div>
    </div>

</footer>
</body>
</html>