
<style>
    .scroll_slider {
        width: 100%;
        float: left;
        font-family: sans;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    .scroll_slider .onvan {
        width: 100%;
        height: 51px;
        float: right;
        background-color: white;
        border-radius: 5px 5px 0 0;
    }

    .scroll_slider h3 {
        font-size: 14pt;
        font-weight: normal;
        float: right;
        margin: 0;
        color: #6f6f6f;
        line-height: 50px;
        width: 140px;
        text-align: center;
        border-bottom: 1px solid #6f6f6f;
        margin-right: 20px;
    }

    .scroll_slider .badane {
        width: 100%;
        float: right;
        height: 330px;
        background: white;
        border-radius: 0 0 5px 5px;
    }

    .badane .prevBtn_div {
        width: 56px;
        height: 100%;
        float: right;
        position: relative;
    }

    .badane .prevBtn_div .prevBtn_span {
        display: block;
        width: 32px;
        height: 32px;
        position: absolute;
        top: 149px;
        right: 12px;
        cursor: pointer;
        background: url(public/images/arrowright.png) no-repeat center;
    }

    .badane .nextBtn_div {
        width: 56px;
        height: 100%;
        float: left;
        position: relative;
    }

    .badane .nextBtn_div .nextBtn_span {
        display: block;
        width: 32px;
        height: 32px;
        position: absolute;
        top: 149px;
        left: 12px;
        cursor: pointer;
        background: url(public/images/arrowleft.png) no-repeat center;
    }

    .scroll_slider .scroll_item {
        width: 918px;
        height: 100%;
        float: right;
        overflow: hidden;
    }

    .scroll_item ul {
        padding: 0;
        width: 920px;
        height: 100%;
        float: right;
    }

    .scroll_item ul li {
        height: 100%;
        float: right;
        width: 230px;
    }

    .scroll_item ul li a {
        width: 100%;
        height: 100%;
        display: block;
        float: right;
        text-align: center;
    }

    .scroll_item img {
        height: 200px;
        width: 150px;
        margin: 20px 0 15px 0;
        border-radius: 4px;
    }

    .scroll_item p {
        text-align: center;
        margin: 0;
        color: #6f6f6f;
        font-size: 10.5pt;
    }

</style>
<div class="scroll_slider">
    <div class="onvan">
        <h3>
            عنوان اسلایدر
        </h3>
    </div>
    <div class="badane">
        <div class="prevBtn_div">
            <span class="prevBtn_span" onclick="scrollSlider('previous',this)"></span>
        </div>
        <div class="scroll_item">
            <ul>
                <?php
                $items = $data[3];
                foreach ($items as $item) {
                    ?>
                    <li>
                        <a href="<?= URL ?>product/index/<?= $item['id'] ?>">
                            <img src="public/images/books/<?= $item['id'] ?>/book_250.jpg">
                            <p>
                                <?= $item['esm'] ?>
                            </p>
                            <p>
                                <?= $item['gheymat'] ?>
                                هزار تومان
                            </p>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="nextBtn_div">
            <span class="nextBtn_span" onclick="scrollSlider('next',this)"></span>
        </div>
    </div>
</div>
<script>
    function scrollSlider(direction, tag) {

        var span_tag = $(tag);

        var scrollSliderTag = span_tag.parents('.scroll_slider');
        var scrollSliderUL = scrollSliderTag.find('.scroll_item ul');
        var scrollSliderLI = scrollSliderUL.find('li');
        var scrollSliderItemNum = scrollSliderLI.length;

        var maxNegMargin = -(scrollSliderItemNum - 4) * 230;

        scrollSliderUL.css('width', scrollSliderItemNum * 230);


        var marginRightNew;
        var marginRightOld = scrollSliderUL.css('margin-right'); //tule ul ra mesle navar kesh midahad.

        marginRightOld = parseFloat(marginRightOld);   //marginRightOld be in surat ast: --px ke bakhsh adadi mad nazar ast.

        if (direction == 'next') {
            marginRightNew = marginRightOld - 230;
        }
        if (direction == 'previous') {
            marginRightNew = marginRightOld + 230;
        }

        if (marginRightNew < maxNegMargin) {
            marginRightNew = 0;
        }
        if (marginRightNew > 0) {
            marginRightNew = maxNegMargin;
        }

        scrollSliderUL.animate({'marginRight': marginRightNew}, 700);

    }

</script>