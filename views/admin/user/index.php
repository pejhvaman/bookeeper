<?php
$active_menu = 'user';
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

    .menuTable tr td:first-child {
        width: 10%;
    }

    .menuTable tr td:nth-child(2) {
        width: 15%;

    }

    .menuTable tr td:nth-child(3) {
        width: 20%;
    }

    .menuTable tr td:last-child {
        width: 5%;
    }

    .menuTable tr td:last-child {
        border-left: unset;
    }

    .menuTable tr:last-child td {
        border-bottom: unset;
    }

    .selectTik {
        position: relative;
        text-align: center;
    }

    .deleteBtn {
        float: left;
        padding: 5px 15px;
        text-align: center;
        color: white;
        border-radius: 8px;
        transition: 0.08s;
        background: #ef5343;
        cursor: pointer;
    }

    .deleteBtn:hover {
        opacity: .7;
    }

    .row {
        width: 100%;
        float: right;
        padding: 15px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-items: flex-end;
    }

    .row * {
        margin: 4px;
    }

    #action {
        width: 10%;
        border: 1px solid #545454;
        border-radius: 4px;
        font-family: sans;
    }
</style>
<?php
$users = $data['users'];
?>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            مدیریت اعضا
        </h2>

        <hr>
        <div class="row">
            <select name="action" id="action">
                <option value="1">
                    ارتقا به مدیر
                </option>
                <option value="2">
                    ارتقا به کارمند
                </option>
                <option value="3">
                    ارتقا به کاربر عادی
                </option>
                <option value="4">
                    حذف
                </option>
            </select>
            <a onclick="submitFormMulti();" class="deleteBtn">
                اجرای عملیات
            </a>
        </div>
        <form id="comment_form" action="" method="post">

            <table class="menuTable sans font_gray" cellpadding="0" cellspacing="0">
                <tr>
                    <td>کد</td>
                    <td>نام</td>
                    <td>شماره موبایل</td>
                    <td>سطح دسترسی</td>
                    <td>انتخاب</td>
                </tr>
                <?php
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            echo $user['id'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $user['nam'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $user['mobile'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $user['levelTitle'];
                            ?>
                        </td>
                        <td class="selectTik">
                            <input name="ids[]" value="<?= $user['id'] ?>" type="checkbox">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>

        <script>
            function submitFormMulti() {
                var action_id = $('#action option:selected').val();
                var action = '';
                if (action_id == 1) {
                    action = 'adminuser/changelevel1';
                }
                if (action_id == 2) {
                    action = 'adminuser/changelevel2';
                }
                if (action_id == 3) {
                    action = 'adminuser/changelevel3';
                }
                if (action_id == 4) {
                    action = 'adminuser/deleteuser';
                }
                var comment_form = $('#comment_form');
                comment_form.attr('action', action);
                comment_form.submit();
            }

            /*$('.selectTik').click(function () {
                $(this).find('.checkBoxManual').toggleClass('selectCheck');
            });*/
        </script>
    </div>
</div>

