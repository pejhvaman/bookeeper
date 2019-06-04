<?php
require('views/admin/rightSide.php');
?>
<script src="public/ckeditor/ckeditor.js"></script>
<style>
    .leftSide {
        width: 1020px;
        float: left;
        background: #fff;
    }

    .menuContent {
        padding: 20px;
        width: 96%;
        position: relative;
    }

    .menuContent a {
        text-decoration: none;
    }

    .row {
        width: 97%;
        padding: 15px;
    }

    .row .title {
        display: inline-block;
        width: 200px;
    }

    .row input[type=text] {
        width: 40%;
        padding: 10px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        font-family: sans;
        color: #6f6f6f;
    }

    .submitBtn {
        width: 10%;
        padding: 8px;
        border: unset;
        border-radius: 4px;
        color: white;
        background: #d63031;
        position: absolute;
        left: 15px;
        bottom: 15px;
        cursor: pointer;
        font-size: 14pt;
        transition: 0.08s;
    }

    .submitBtn:hover {
        opacity: .7;
    }

   /* .moarefi_area {
        width: 40%;
        padding: 10px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        font-family: sans;
        color: #6f6f6f;
        resize: none;
    }*/

</style>
<?php
$bookInfo = $data['bookInfo'];
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            افزودن مشخصه جدید برای کتاب
            <?php
            echo $bookInfo['esm'];
            ?>
            به ترجمه ی
            <?php
            echo $bookInfo['motarjem'];
            ?>
            از انتشارات
            <?php
            echo $bookInfo['entesharat'];
            ?>
        </h2>
        <hr>
        <form action="adminproduct/addproperty/<?php echo $bookInfo['id'] ?>" method="post">
            <div class="row">
                <span class="title">
                    عنوان مشخصه:
                </span>
                <input type="text" name="title" value=""
                       placeholder="نام مشخصه را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    توضیحات مشخصه:
                </span>
                <textarea rows="4" class="editor1" id="editor1" name="tozihat"></textarea>
            </div>
            <div class="row">
                <button type="submit" class="submitBtn sans">
                    ثبت
                </button>
            </div>
        </form>
        <script>
            CKEDITOR.replace('editor1', {language: 'fa'});
        </script>
    </div>
</div>
