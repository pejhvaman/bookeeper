<script src="public/js/jquery-ui.min.js"></script>
<script src="public/flat-slider/slider.js"></script>
<link rel="stylesheet" href="public/flat-slider/style.css">
<style>
    #content {
        width: 100%;
        float: right;
        background: white;
        border-radius: 4px;
        box-shadow: 8px 8px 8px #f0f0f0;
    }

    #content > h2 {
        font-family: sans;
        color: #8b8b8b;
        padding: 10px 10px 15px 0;
        margin: 0;
    }

    #content_r {
        width: 40%;
        float: right;
    }

    .row1 {
        width: 100%;
        float: right;
        text-align: center;
        margin: 25px auto;
    }

    .row1 > h3 {
        font-family: sans;
        font-size: 17pt;
        color: #8b8b8b;
        text-align: right;
        margin: 0;
    }

    #product_img {
        max-width: 250px;
        border-radius: 10px;
        /*display: block;*/
        overflow: hidden;
        border: 1px solid #eaeaea;
        transition: 0.01s;
        cursor: pointer;
    }

    #product_img:hover {
        box-shadow: 0 0 25px #c3c3c3;
    }

    #product_title {
        color: #8b8b8b;
        font-family: sans;
        font-size: 18pt;
        font-weight: lighter;
        transition: 0.01s;
    }

    #product_title:hover {
        opacity: 0.6;
    }

    #content_l {
        width: 60%;
        float: left;
    }

    .row2 {
        width: 50%;
        float: right;
        margin: 5px auto;
        text-align: right;
    }

    .row2 label {
        display: block;
        margin: 0 0 0 12px;
        font-family: sans;
        font-size: 15pt;
        color: #8b8b8b;
    }

    #nazar_box {
        border: 1px solid #e3e3e3;
        border-radius: 8px;
        padding: 10px;
        float: right;
        font-family: sans;
        font-size: 11pt;
        color: #8b8b8b;
        direction: rtl;
    }

    .btn-pejhva {
        display: block;
        width: 100px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        float: left;
        padding: 0 10px;
        background: #00b189;
        border-radius: 4px;
        font-family: sans;
        font-size: 16pt;
        color: whitesmoke;
        cursor: pointer;
        transition: 500ms;
        margin-left: 50px;
    }

    .btn-pejhva:hover {
        opacity: 0.7;
    }

    #title_input {
        width: 200px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        padding: 10px;
        float: right;
        font-family: sans;
        font-size: 11pt;
        color: #8b8b8b;
        margin-bottom: 10px;
    }
</style>
<?php
$product_info = $data['product_info'];
$comment_info = $data['comment_info'];
?>
<div id="content">
    <h2>
        نظر خودتو در مورد این کتاب بهمون بگو...
    </h2>
    <div id="content_r">
        <div class="row1">
            <a href="">
                <img id="product_img" src="public/images/books/<?= $product_info['id'] ?>/book_250.jpg">
            </a>
        </div>
        <div class="row1">
            <a href="">
                <span id="product_title">
                    <?= $product_info['esm'] ?>
                </span>
            </a>
        </div>
    </div>
    <div id="content_l">
        <!--<div class="row1">
            <h3>
                نظرسنجی کن
            </h3>
            <div class="row2">
                <label for="">عنوان۱</label>
                <input type="hidden" id="flat-slider" class="flat-slider">
            </div>
            <div class="row2">
                <label for="">عنوان۲</label>
                <input type="hidden" id="flat-slider" class="flat-slider">
            </div>
            <div class="row2">
                <label for="">عنوان۳</label>
                <input type="hidden" id="flat-slider" class="flat-slider">
            </div>
            <div class="row2">
                <label for="">عنوان۴</label>
                <input type="hidden" id="flat-slider" class="flat-slider">
            </div>
        </div>-->
        <form id="comment_form" action="addcomment/savecomment/<?= $product_info['id'] ?>" method="post">
            <div class="row1">
                <h3>
                    نظرتو بنویس
                </h3>
                <input id="title_input" type="text" name="title" value="<?= $comment_info['title'] ?>" placeholder="عنوان نظرتو بنویس">
                <textarea name="nazar" id="nazar_box" cols="120" rows="10"><?= $comment_info['matn'] ?></textarea>
            </div>
        </form>
        <div class="row1">
            <span onclick="submitComment()" class="btn-pejhva">
                ثبت
            </span>
        </div>
    </div>
</div>
<script>
    $('.flat-slider').flatslider({
        min: 1,
        max: 5,
        step: 1,
        value: 3,
        orientation: 'horizontal',
    });

    function submitComment() {
        $('#comment_form').submit();
    }
</script>