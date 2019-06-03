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
        width: 100px;
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

    #selectParent {
        width: 20%;
        padding: 8px;
        border: 1px solid #efefef;
        border-radius: 4px;
    }

    .moarefi_area {
        width: 40%;
        padding: 10px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        font-family: sans;
        color: #6f6f6f;
        resize: none;
    }

    .span_chosen_option {
        font-family: sans;
        display: inline-block;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        padding: 6px;
        margin-right: 5px;
    }

    .span_chosen_option .remove_icon {
        display: inline-block;
        width: 24px;
        height: 24px;
        background: url(public/images/x-button.png) no-repeat center;
        vertical-align: middle;
        cursor: pointer;
        margin-right: 4px;
    }

</style>
<?php
$bookInfo = $data['bookInfo'];
$edit = 0;
if (isset($bookInfo['esm'])){
    $edit = 1;
}else
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">

            <?php
            if ($edit == 0) {
                ?>
                افزودن محصول جدید
                <?php
            } elseif ($edit == 1) {
                ?>
                ویرایش محصول
                <?php
            }
            ?>

        </h2>
        <hr>
        <form action="adminproduct/addproduct/<?= @$bookInfo['id'] ?>" method="post">
            <div class="row">
                <span class="title">
                    عنوان محصول:
                </span>
                <input type="text" name="title" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['esm'];
                } ?>"
                       placeholder="نام محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    نام نویسنده:
                </span>
                <input type="text" name="nevisande" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['nevisande'];
                } ?>"
                       placeholder="نام نویسنده را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    نام مترجم:
                </span>
                <input type="text" name="motarjem" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['motarjem'];
                } ?>"
                       placeholder="نام مترجم را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    قیمت:
                </span>
                <input type="text" name="gheymat" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['gheymat'];
                } ?>"
                       placeholder="قیمت محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    معرفی اجمالی:
                </span>
                <textarea rows="4" class="moarefi_area editor1" id="editor1" type="text" name="moarefi"
                          placeholder="متنی به عنوان معرفی محصول جدید وارد کنید"><?php if ($edit == 0) {
                    } else {
                        echo $bookInfo['moarefi'];
                    } ?></textarea>
            </div>
            <div class="row">
                <span class="title">
                    تعداد موجود:
                </span>
                <input type="text" name="tedad_mojud" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['tedad_mojud'];
                } ?>"
                       placeholder="تعداد محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    میزان تخفیف (عدد مربوط به درصد تخفیف):
                </span>
                <input type="text" name="takhfif" value="<?php if ($edit == 0) {
                } else {
                    echo $bookInfo['takhfif'];
                } ?>"
                       placeholder="عدد درصد تخفیف محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    انتشارات محصول:
                </span>
                <select name="entesharat" id="selectParent" class="sans font_gray">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $entesharat = $data['entesharat'];
                    foreach ($entesharat as $row) {

                        ?>
                        <option value="<?= $row['id'] ?>" <?php if ($edit == 0) {
                        } else {
                            if ($bookInfo['identesharat'] == $row['id']) {
                                echo 'selected';
                            }
                        } ?>>
                            <?= $row['nam'] ?>
                        </option>
                        <?php
                    }
                    ?>

                </select>
            </div>
            <div class="row">
                <span class="title">
                    دسته بندی محصول:
                </span>
                <select name="" id="selectParent" class="sans font_gray">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $cats = $data['categories'];
                    foreach ($cats as $cat) {
                        ?>
                        <option data-catname="<?= $cat['title'] ?>" onclick="addCat(this,'<?= $cat['id'] ?>')"
                                value="<?= $cat['id'] ?>">
                            <?= $cat['title'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <?php
                if ($edit == 0) {
                } else {
                    $allCatsInfo = $bookInfo['allCatsInfo'];
                    foreach ($allCatsInfo as $catInfo) {
                        ?>
                        <span class="span_chosen_option">
                        <input type="hidden" name="cat[]" value="<?= $catInfo['id'] ?>">
                        <?= $catInfo['title'] ?>
                        <i class="remove_icon" onclick="removeItem(this)"></i>
                    </span>
                        <?php
                    }
                }
                ?>
            </div>
            <button type="submit" class="submitBtn sans">
                ثبت
            </button>
        </form>
        <script>
            function addCat(tag, catId) {
                var optionTag = $(tag);
                var catName = optionTag.attr('data-catname');
                //alert(catName);
                var spanTag = '<span class="span_chosen_option"><input type="hidden" name="cat[]" value="' + catId + '">' + catName + '<i class="remove_icon" onclick="removeItem(this)"></i></span>';
                var parentTag = optionTag.parents('.row');
                parentTag.append(spanTag);
            }

            function removeItem(tag) {
                var removeIcon = $(tag);
                var spanItem = removeIcon.parents('.span_chosen_option');
                spanItem.remove();
            }

            CKEDITOR.replace('editor1', {language: 'fa'});
        </script>
    </div>
</div>
