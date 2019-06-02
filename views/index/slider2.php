<style>
    .slider2 {
        width: 1030px;
        height: 430px;
        float: left;
        border-radius: 5px;
        overflow: hidden;
        background: white;
        margin: 15px 0;
        font-family: sans;
        color: #6f6f6f;
        position: relative;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    .flipTimer, .flipTimer div {
        direction: ltr !important;
    }

    .flipTimer {
        position: absolute;
        transform: scale(0.4);
        bottom: -10px;
        right: -50px;
    }

    .finished {
        width: 200px;
        height: 90px;
        border: 18px solid #cccccc;
        border-radius: 40px;
        position: absolute;
        text-align: center;
        line-height: 90px;
        font-size: 30pt;
        right: 320px;
        top: 165px;
        display: none;
    }

    .slider2_content {
        float: right;
        width: 830px;
        height: 100%;

    }

    .slider2_item {
        display: block;
        width: 100%;
        height: 100%;
    }

    .slider2_content_right {
        float: right;
        width: 415px;
        height: 100%;
    }

    .slider2_content_left {
        float: left;
        width: 415px;
        height: 100%;
    }

    .special_off {
        color: #e54a86;
        font-size: 14pt;
        margin: 60px 0 0 0;
        padding-right: 30px;
    }

    .item_price {
        float: right;
        margin-right: 15px;
        width: 250px;
        height: 33px;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
    }

    .old_price {
        display: block;
        height: 100%;
        width: 96px;
        background: #e54a86;
        color: white;
        text-align: center;
        line-height: 33px;
        float: right;
    }

    .old_price::before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9.5px 15px 9.5px 0;
        border-color: transparent #e54a85 transparent transparent;
        position: absolute;
        right: 96px;
        top: 8px;
        z-index: 3;
    }

    .new_price {
        display: block;
        float: left;
        height: 100%;
        width: 150px;
        background: #67bfb0;
        text-align: center;
        line-height: 33px;
        color: white;
    }

    .new_price::before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9.5px 15px 9.5px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        right: 100px;
        top: 8px;
    }

    .item_price div {
        width: 80px;
        height: 2px;
        background: #6f6f6f;
        transform: rotate(-18deg);
        position: absolute;
        top: 15px;
        right: 10px;
    }

    .descript {
        float: right;
        width: 100%;
        margin: 30px 20px 0 0;
    }

    .descript p {
        margin: 10px 0;
    }

    .item_title {
        text-align: center;
        font-size: 16pt;
    }

    .slider2_content_left img {
        max-width: 230px;
        max-height: 301px;
        border-radius: 5px;
        margin-right: 100px;
        overflow: hidden;
    }
    #moarefi{
        height: 80px !important;
        overflow: hidden;
    }
</style>
<div class="slider2">
    <div class="flipTimer">
        <div class="days"></div>
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>
    <div class="finished">تمام شد!</div>

    <div class="slider2_content">
        <?php
        $slider2 = $data[1];
        foreach ($slider2 as $row) {

            ?>
            <a href="<?= URL ?>product/index/<?= $row['id'] ?>" class="slider2_item" style="color: #6f6f6f !important;">
                <div class="slider2_content_right">
                    <p class="special_off">
                        تخفیف ویژه
                    </p>
                    <div class="item_price">
                        <div></div>
                        <span class="old_price">
                            <?= $row['gheymat'] ?>
                            </span>
                        <span class="new_price">
                                <?= $row['total_price']?>
                                هزار تومان
                            </span>
                    </div>
                    <div class="descript">
                        <p>
                            نام نویسنده :
                            <?= $row['nevisande'] ?>
                        </p>
                        <p>
                            نام ناشر :
                            <?= $row['nasher'] ?>
                        </p>
                        <p>
                            مترجم :
                            <?= $row['motarjem'] ?>
                        </p>
                        <p id="moarefi">
                            توضیحاتی چند در مورد اثر :
                            <?= $row['moarefi'] ?>
                        </p>
                    </div>
                </div>
                <div class="slider2_content_left">
                    <p class="item_title" >
                        <?= $row['esm'] ?>
                    </p>
                    <img src="public/images/books/<?= $row['id'] ?>/book_250.jpg">
                </div>
            </a>
            <?php
        }
        ?>
    </div>
    <style>
        .slider2_nav {
            float: left;
            width: 200px;
            height: 100%;
        }

        .slider2_nav ul {
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .slider2_nav ul li {
            width: 100%;
            height: 43px;
            background: #f0f0f0;
            position: relative;
            cursor: pointer;
            color: #6f6f6f;
        }

        .slider2_nav ul li.activeSlide2 {
            background: #e54a85;
            color: white !important;
        }

        .slider2_nav ul li.activeSlide2::before {
            content: '';
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 21px 0 21px 25px;
            border-color: transparent transparent transparent #e54a85;
            position: absolute;
            right: -25px;
        }

        .slider2_nav ul li a {
            width: 100%;
            height: 100%;
            display: block;
            line-height: 42px;
            text-align: center;
        }

    </style>
    <div class="slider2_nav">
        <ul>
            <?php
            foreach ($data[1] as $row) {
                ?>
                <li>
                    <a>
                        <?= $row['esm']; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<script>
<?php
        $end_date = $data[2];
?>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $end_date ?>',
        callback: function () {
            $('.slider2_content').css('opacity', 0.2);
            $('.finished').fadeIn(100);
        }
    });


    var slider2tag = $('.slider2');
    var slider2items = slider2tag.find('.slider2_item');
    var numitems2 = slider2items.length;
    var nextslide2 = 1;
    var timeOut2 = 3000;
    var slider2nav = slider2tag.find('.slider2_nav ul li');

    function slider2() {
        if (nextslide2 > numitems2) {
            nextslide2 = 1;
        }
        if (nextslide2 < 1) {
            nextslide2 = numitems2;
        }

        slider2items.hide();
        slider2items.eq(nextslide2 - 1).fadeIn(100);
        slider2nav.removeClass('activeSlide2');
        slider2nav.eq(nextslide2 - 1).addClass('activeSlide2');
        nextslide2++;
    }

    slider2();
    var sliderstop2 = setInterval(slider2, timeOut2); /*setInterval is for repeat the order(s) & setTimeout is for intrupt in acting (an) orders.*/
    slider2tag.mouseleave(function () {
        clearInterval(sliderstop2);
        sliderstop2 = setInterval(slider2, timeOut2);
    });


    $('.slider2 .slider2_nav ul li').click(function () {
        clearInterval(sliderstop2);
        var index2 = $(this).index();
        gotoslide_2(index2);
    });

    function gotoslide_2(index2) {
        nextslide2 = index2 + 1;
        slider2();
    }
</script>