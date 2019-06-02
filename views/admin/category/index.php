<?php
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
    }
    .menuContent a{
        text-decoration: none;
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

    /*.menuTable input[type = checkbox] {

    }*/

    .selectTik {
        position: relative;
        text-align: center;
    }

    .checkBoxManual {
        background: url(public/images/tikgray.png) no-repeat center;
        display: inline-block;
        width: 24px;
        height: 24px;
        position: absolute;
        right: 40%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }
    .checkBoxManual:hover{
        opacity: .6;
    }

    .selectCheck {
        background: url(public/images/tikdone.png) no-repeat center;
    }

    .lookSub {
        position: relative;
    }

    .lookSubIcon {
        display: inline-block;
        width: 32px;
        height: 32px;
        cursor: pointer;
        background: url(public/images/look.png) no-repeat center;
        right: 40%;
        position: absolute;
        transform: translate(-50%, -50%);
    }
    .lookSubIcon:hover {
        opacity: .6;
    }
    .addBtn, .deleteBtn {
        float: left;
        padding:5px 15px;
        text-align: center;
        color: white;
        margin: 15px 20px 15px 0;
        border-radius: 8px;
        transition: 0.08s;
    }
    .addBtn:hover{
        opacity: .7;
    }
    .deleteBtn{
        background: #ef5343;
        cursor: pointer;
    }
    .addBtn{
        background: #67bfb0;
    }

    .deleteBtn:hover{
        opacity: .7;
    }
    .edit{
        position: relative;
    }
    .editIcon{
        display: block;
        width: 24px;
        height: 24px;
        background: url(public/images/editadmin.png) no-repeat center;
        right: 35%;
        position: absolute;
        transform: translate(-50%, -50%);
    }
    .editIcon:hover {
        opacity: .6;
    }
    .dirIcon {
        display: inline-block;
        width: 16px;
        height: 16px;
        background: url(public/images/chevron-sign-left.png) no-repeat center;
    }
    .pathLinks:visited {
        color: unset;
    }
</style>
<?php
$categories = $data['categories'];
$parents=[];
if(isset($data['parents'])){
    $parents = $data['parents'];
}

$parents = array_reverse($parents);
$thisValedCat=[];
if(isset($data['thisValedCat'])){
    $thisValedCat = $data['thisValedCat'];
}


?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            مدیریت دسته ها
        </h2>
        <?php
        foreach ($parents as $parent) {
            ?>
            <a class="pathLinks" href="admincategory/showSubCats/<?= $parent['id'] ?>">
                <?php
                echo $parent['title'];
                ?>
            </a>
            <i class="dirIcon"></i>
            <?php
        }
        ?>
        <a href="admincategory/<?php if (isset($thisValedCat['id'])){echo 'showSubCats/'.$thisValedCat['id'];}else{echo 'index';} ?>" class="font_gray">
            <?php
            if (isset($thisValedCat['title'])){
                echo $thisValedCat['title'];
            }else{
                echo 'دسته های اصلی';
            }
            ?>
        </a>
        <hr>
        <a class="addBtn" href="admincategory/addcategory/<?= @$thisValedCat['id'] ?>">
            افزودن
        </a>
        <a onclick="submitForm();" class="deleteBtn">
            حذف
        </a>
        <form action="admincategory/deletecategory/<?= @$thisValedCat['id'] ?>" method="post">

            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>ویرایش</td>
                    <td>مشاهده زیر دسته (ها)</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($categories as $key => $category) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $key + 1;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $category['title']
                            ?>
                        </td>
                        <td class="edit">
                            <a href="admincategory/addcategory/<?= $category['id'] ?>/edit">
                                <i class="editIcon"></i>
                            </a>
                        </td>
                        <td class="lookSub">
                            <a href="admincategory/showSubCats/<?= $category['id'] ?>">
                                <i class="lookSubIcon"></i>
                            </a>

                        </td>
                        <td class="selectTik">
                            <input name="id[]" value="<?= $category['id'] ?>" type="checkbox">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>

        <script>
            function submitForm() {
                $('form').submit();
            }
            /*$('.selectTik').click(function () {
                $(this).find('.checkBoxManual').toggleClass('selectCheck');
            });*/
        </script>
    </div>
</div>