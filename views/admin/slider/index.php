<?php
$active_menu = 'slider1';
require('views/admin/rightSide.php');
?>
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
        width: 150px;
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
        text-align: center;
        display: inline-block;
        width: 10%;
        padding: 8px;
        border: unset;
        border-radius: 4px;
        color: white;
        background: #0097a4;
        position: relative;
        left: 15px;
        bottom: 15px;
        cursor: pointer;
        font-size: 14pt;
        transition: 0.08s;
        margin: 30px;
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

    .menuTable {
        width: 100%;
        border: 1px solid #efefef;
        border-radius: 8px;
        margin-top: 40px;
    }

    .menuTable tr {
        text-align: center;
    }

    .menuTable tr td {
        padding: 10px;
        border-left: 1px solid #efefef;
        border-bottom: 1px solid #efefef;
    }

    .menuTable tr td:last-child {
        border-left: unset;
    }

    .menuTable tr:last-child td {
        border-bottom: unset;
    }

    .deleteBtn {
        float: left;
        padding: 5px 15px;
        text-align: center;
        color: white;
        margin: 15px 20px 15px 0;
        border-radius: 8px;
        transition: 0.08s;
        background: #ef5343;
        cursor: pointer;
    }


    .deleteBtn:hover {
        opacity: .7;
    }

    #showslider img {
        max-width: 200px;
    }
</style>
<?php
$slider1 = $data['slider1'];
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">

            مدیریت اسلایدر اول

        </h2>
        <hr>
        <form id="addSlider" action="adminslider/index/" enctype="multipart/form-data" method="post">
            <div class="row">
                <span class="title">
                    عنوان :
                </span>
                <input type="text" name="title" placeholder="نام محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    لینک :
                </span>
                <input type="text" name="link" placeholder="نام محصول جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    تصویر را انتخاب کنید:
                </span>
                <input type="file" name="ax">
            </div>
            <div class="row">
                <input name="id_to_insert" id="last_id" type="hidden" value="">
            </div>
            <div class="row">
                <span onclick="submitSlider()" type="submit" class="submitBtn sans">
                    ثبت
                </span>
            </div>
        </form>

        <a onclick="submitDelete();" class="deleteBtn">
            حذف
        </a>
        <form id="showslider" action="adminslider/deleteitem" method="post">

            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>تصویر</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($slider1 as $key => $item) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $item['id'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $item['title'];
                            ?>
                        </td>
                        <td>
                            <img src="<?= $item['img'] ?>" alt="">
                        </td>
                        <td class="selectTik">
                            <input name="ids[]" value="<?= $item['id'] ?>" type="checkbox">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>
    </div>
    <script>
        function submitSlider() {
            $('#addSlider').submit();
        }

        function submitDelete() {
            $('#showslider').submit();
        }

        function getLastUpdatedId() {
            var showFormTag = $('#showslider');
            var trTag = showFormTag.find('table tr').eq(1);
            var lastId = trTag.find('td').eq(0).text();

            var addFormTag = $('#addSlider');
            idToInsert = parseInt(lastId) + 1;
            addFormTag.find('#last_id').attr('value', idToInsert);
        }

        getLastUpdatedId();

    </script>
</div>
