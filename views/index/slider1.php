
<style>

    .slider_1 {
        width: 1030px;
        height: 350px;
        float: left;
        border-radius: 5px;
        overflow: hidden;
        background: white;
        position: relative;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    .div_pic {
        width: 100%;
        height: 100%;
        float: left;
    }

    .div_pic a {
        display: none;
        width: 100%;
        height: 100%;
        float: left;
    }

    .div_pic img {

        max-width: 100%;
        max-height: 100%;
        float: left;
    }

    .next_btn, .prev_btn {
        display: block;
        width: 64px;
        height: 64px;
        position: absolute;
        top: 150px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 3;
    }

    .next_btn {
        right: 15px;
        background: url(public/images/right-arrow.png) no-repeat center;
    }

    .prev_btn {
        left: 15px;
        background: url(public/images/left-arrow.png) no-repeat center;
    }

    .slider1_nav {
        width: 1030px;
        height: 50px;
        background: rgba(91, 88, 92, 0.45);
        float: left;
        position: relative;
        top: -50px;
    }

    .slider1_nav ul {
        padding: 0;
        height: 100%;
    }

    .slider1_nav ul li {
        float: right;
        width: 206px;
        height: 100%;
        font-family: sans;
        font-size: 16pt;
        color: white;
        text-align: center;
        line-height: 50px;
        cursor: pointer;
        position: relative;
    }

    .slider1_nav ul li.activeSlide {
        border-top: 4px solid #e54a86;
    }

    .slider1_nav ul li.activeSlide::before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 14px 20px 14px;
        border-color: transparent transparent #e54a86 transparent;
        position: absolute;
        top: -20px;
        right: 88px;
    }

</style>
<div class="slider_1">
    <span class="next_btn"></span>
    <span class="prev_btn"></span>
    <div class="div_pic">
        <?php
        foreach ($data[0] as $slider1) {
            ?>
            <a href="<?= $slider1['link'] ?>" class="slider1_item">
                <img src="<?= $slider1['img'] ?>">
            </a>
            <?php
        }
        ?>
    </div>
    <div class="slider1_nav">
        <ul>
            <li>
                <a>
                    بیگانه
                </a>
            </li>
            <li>
                <a>
                    طاعون
                </a>
            </li>
            <li>
                <a>
                    افسانه سیزیف
                </a>
            </li>
            <li>
                <a>
                    انسان طاغی
                </a>
            </li>
            <li>
                <a>
                    سقوط
                </a>
            </li>
        </ul>
    </div>
</div>
<script>

    var slider1tag = $('.slider_1');
    var slider1item = slider1tag.find('.slider1_item');
    var slider1Num = slider1item.length;
    var nextslide1 = 1;
    var slider1nav = slider1tag.find('.slider1_nav ul li');
    var timeOut1 = 4000;


    function slider1() {

        if (nextslide1 > slider1Num) {
            nextslide1 = 1;
        }
        if (nextslide1 < 1) {
            nextslide1 = slider1Num;
        }

        slider1item.hide();
        slider1item.eq(nextslide1 - 1).fadeIn(100);

        slider1nav.removeClass('activeSlide');
        slider1nav.eq(nextslide1 - 1).addClass('activeSlide');
        nextslide1++;
    }

    slider1();

    var stopslider1 = setInterval(slider1, timeOut1);
    slider1tag.mouseleave(function () {
        clearInterval(stopslider1);
        stopslider1 = setInterval(slider1, timeOut1);
    });

    $('.prev_btn').click(function () {
        clearInterval(stopslider1);
        slider1();
    });

    $('.next_btn').click(function () {
        clearInterval(stopslider1);
        nextslide1 = nextslide1 - 2;     //chon dar click ruye <li> nextslide1+1 shode ast pas bayad 2 ta kam shavad baraye aghbgard.
        slider1();
    });

    $('.slider_1 .slider1_nav li').click(function () {
        clearInterval(stopslider1);
        var index = $(this).index();
        //index mesle eq az 0 shoro mishavad.
        nextslide1 = index + 1;
        slider1();
    });


</script>