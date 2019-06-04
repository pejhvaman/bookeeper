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

    .menuContent a {
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

    .addBtn, .deleteBtn {
        float: left;
        padding: 5px 15px;
        text-align: center;
        color: white;
        margin: 15px 20px 15px 0;
        border-radius: 8px;
        transition: 0.08s;
    }

    .addBtn:hover {
        opacity: .7;
    }

    .deleteBtn {
        background: #ef5343;
        cursor: pointer;
    }

    .addBtn {
        background: #67bfb0;
    }

    .deleteBtn:hover {
        opacity: .7;
    }

    .tdvaled {
        position: relative;
    }

    .editIcon {
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

</style>
<?php
$property = $data['property'];
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            مدیریت مشخصات هر محصول
        </h2>

        <hr>
        <a class="addBtn" href="adminproduct/">
            افزودن
        </a>
        <a onclick="submitForm();" class="deleteBtn">
            حذف
        </a>
        <form action="adminproduct/" method="post">

            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>ردیف</td>
                    <td>عنوان</td>
                    <td>ویرایش</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($property as $key => $row) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $key + 1;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row['title'];
                            ?>
                        </td>
                        <td class="tdvaled">
                            <a href="adminproduct/">
                                <i class="editIcon"></i>
                            </a>
                        </td>
                        <td class="selectTik">
                            <input name="ids[]" value="<?= $row['id'] ?>" type="checkbox">
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