<style>


    #content_right {
        width: 230px;
        float: right;
        position: relative;
    }

    #naghdbook {
        width: 100%;
        background: white;
        float: right;
        margin: 20px 0;
        border-radius: 5px;
    }

    #naghdbook ul {
        padding-right: 8px;
        width: 96%;
        float: right;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    #naghdbook ul li {
        width: 100%;
        float: right;
        margin: 15px 0;
        cursor: pointer;
    }

    #naghdbook .pic_circle {
        display: block;
        width: 64px;
        height: 64px;
        float: right;
        border-radius: 100%;
        overflow: hidden;
    }

    #naghdbook .title {
        float: right;
        margin-right: 20px;
        font-family: sans;
        font-size: 10pt;
        width: 132px;
        margin-top: 15px;
    }

    .options_good {
        padding: 0;
        float: right;
        width: 100%;
        overflow: hidden;
    }

    .options_good li {
        width: 100%;
        float: right;
        height: 308px;
        margin-bottom: 10px;
        box-shadow: 2px 2px 5px #cbcbcb;
        overflow: hidden;
    }

    .options_good a {
        float: right;
        position: relative;
    }

    .options_good .option_img {
        width: 230px;
        height: 308px;
        border-radius: 5px;
    }

    .options_good .option_title {
        position: absolute;
        width: 100%;
        text-align: center;
        top: 50px;
        font-family: sans;
        font-size: 25pt;
        color: #ff0042;
        font-weight: bold;
    }

    .parde {
        position: absolute;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.3);
        display: block;
        width: 230px;
        height: 308px;
        border-radius: 5px;
        cursor: pointer;
    }

    .parde {
        transition: all 500ms ease;
    }

    .parde:hover {
        background: rgba(0, 0, 0, 0);
    }
</style>
<div id="content_right">
    <ul class="options_good">
        <li>
            <a>
                <span class="option_title">با طعم موسیقی</span>
                <img class="option_img" src="public/images/82d75b877d985e59cfcedbf6430b5da3.jpg">
                <span class="parde"></span>
            </a>
        </li>
        <li>
            <a>
                <span class="option_title">طراحی جلد</span>
                <img class="option_img" src="public/images/cover.jpg">
                <span class="parde"></span>
            </a>
        </li>
        <li>
            <a>
                <span class="option_title">کتابخانه ها</span>
                <img class="option_img" src="public/images/library.jpg">
                <span class="parde"></span>
            </a>
        </li>
    </ul>

    <div id="naghdbook">
        <ul>
            <li>
                <a class="pic_circle" style="background: url(public/images/sart1.jpg) no-repeat center;"></a>
                <span class="title font_gray">
                        نقد و بررسی رمان تهوع از ژان پل سارتر
                    </span>
            </li>
            <li>
                <a class="pic_circle" style="background: url(public/images/camu1.jpg) no-repeat center;"></a>
                <span class="title font_gray">
                        نقد و بررسی رمان طاعون از آلبر کامو
                    </span>
            </li>
            <li>
                <a class="pic_circle" style="background: url(public/images/markez1.jpg) no-repeat center;"></a>
                <span class="title font_gray">
سخنان میلان کوندرا در مورد رمان صد سال تنهایی
                    </span>
            </li>
            <li>
                <a class="pic_circle" style="background: url(public/images/ketab1.jpg) no-repeat center;"></a>
                <span class="title font_gray">
صد کتابی که باید خواند...
                    </span>
            </li>
        </ul>
    </div>

</div>