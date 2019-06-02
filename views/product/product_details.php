<style>
    #detail {
        width: 52.23%;
        float: left;
        padding: 25px;
        background: white;
        height: 600px;
    }

    .row {
        width: 100%;
        float: right;
        border-bottom: 1px solid #e9e9e9;
    }
    .row ul li{
        cursor: pointer;
    }
    #bookanme {
        display: inline-block;
        margin: 0;
        color: #6f6f6f;
        font-size: 16pt;
    }

    #writername {
        margin: 0 0 20px 0;
        color: #919191;
        font-size: 13pt;
        display: inline-block;
    }

    .star_rating {
        display: block;
        float: left;
        width: 120px;
        height: 24px;
        background: url(public/images/stargray.png) repeat;
        margin-right: 20px;
        position: relative;
    }

    .gray_star {
        display: block;
        float: left;
        width: 100%;
        height: 100%;
        background: url(public/images/stargray.png) repeat;
    }

    .red_star {
        display: block;
        float: left;
        width: 68%;
        height: 100%;
        background: url(public/images/starred.png) repeat;
        position: absolute;
        left: 0;
    }

    .choose_option {
        width: 300px;
        height: 48px;
        border-radius: 8px;
        border: 1px solid #e9e9e9;
        margin-bottom: 50px;
        background: #f9f9f9;
        cursor: pointer;
        position: relative;
        text-align: center;
    }

    .choose_option::after {
        content: '';
        display: block;
        width: 16px;
        height: 16px;
        background: url(public/images/correct-symbol.png) no-repeat center;
        top: 15px;
        right: 10px;
        position: absolute;
    }

    .choose_option::before {
        content: '';
        display: block;
        width: 16px;
        height: 16px;
        background: url(public/images/chevron-arrow-down.png) no-repeat center;
        top: 18px;
        left: 10px;
        position: absolute;
    }

    .choose_option .option_selected {
        color: #6f6f6f;
        font-size: 12pt;
        line-height: 48px;
    }

    .choose_option .nashers {
        border-radius: 5px;
        border: 1px solid #e9e9e9;
        background: #f9f9f9;
        margin-top: 4px;
        display: none;
        position: relative; /* remember this trick!:position relative + z-index */
        z-index: 4;
    }

    .choose_option .nashers li {
        padding-right: 10px;
        color: #6f6f6f;
        font-size: 11pt;
        cursor: pointer;
    }

    .item_price {
        float: right;
        width: 250px;
        height: 33px;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        margin: 10px 0 0 0;
    }

    .old_price {
        display: block;
        height: 100%;
        width: 98px;
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

    .discount {
        width: 100%;
        float: right;
        margin: 50px 15px 20px 0;
    }

    .discount_amount {
        width: 70px;
        height: 36px;
        border-radius: 24px 0 24px 24px;
        background: #e54a86;

        color: white;
        font-size: 16pt;
        text-align: center;
    }

    .btnMain {
        display: block;
        border-radius: 8px;
        width: 323px;
        height: 52px;
        margin-right: 15px;
        margin-bottom: 50px;
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        line-height: 52px;
        font-size: 16pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
        float: right;
    }

    .btnMain:hover {
        background-color: #4d8f84;
    }

    #detail .row:last-child {
        border-bottom: unset;
    }

    #detail * {
        font-family: sans;
    }

    <?php
$bookinfo = $data['bookInfo'];
//$entesharats = $bookinfo['entesharats'];
$ent = $bookinfo['thisBookEntName'];
$bookCats = $bookinfo['bookCats'];
 ?>
</style>
<div id="detail">
    <div class="row">
            <span class="star_rating">
                <span class="gray_star"></span>
                <span class="red_star"></span>
            </span>
        <p id="bookanme"><?= $bookinfo['esm'] ?></p>
        <br>
        <p id="writername"><?= $bookinfo['nevisande'] ?></p>

    </div>
    <div class="row font_gray">
        <span>دسته بندی :</span>
        <ul>
            <?php
            foreach ($bookCats as $bookCat) {
                ?>
                <li>
                    <?php
                    echo $bookCat['title'];
                    ?>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>
    <div class="row font_gray">
        <span>
            ناشر :
        </span>
        <ul>
            <li>
                <?= $ent ?>
            </li>
        </ul>
        <!--<div class="choose_option">
                <span class="option_selected">
                    ناشر 1
                </span>
            <ul class="nashers">
                <?php
/*                foreach ($entesharats as $ent) {
                    */?>
                    <li>
                        <?/*= $ent['nam'] */?>
                    </li>
                    <?php
/*                }
                */?>
            </ul>
            <script>
                var firstLiNasher = $('.nashers li').eq(0).html();
                var defNasher = $('.option_selected');
                defNasher.html(firstLiNasher);
            </script>
        </div>-->
    </div>
    <div class="row">
        <div class="discount">
                <span class="off_title" style="color: #6f6f6f">
                    تخفیف
                </span>
            <div class="discount_amount">
                <?= $bookinfo['takhfif'] ?>%
            </div>
            <div class="item_price">
                <div></div>
                <span class="old_price">
                            <?= $bookinfo['gheymat'] ?>
                    </span>
                <span class="new_price">
                                <?= $bookinfo['total_price'] ?>
                                هزار تومان
                    </span>
            </div>
        </div>
        <span class="btnMain">
                اضافه کردن به سبد خرید
            </span>
    </div>
</div>
<script>
    $('.choose_option').click(function () {
        $(this).find('.nashers').slideToggle(100);
    });

    $('.nashers li').click(function () {
        var textOpt = $(this).text();
        $('.option_selected').text(textOpt);
    });
</script>