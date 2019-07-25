<?php
$active_menu = 'stat';
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

    .row {
        width: 100%;
        float: right;
        padding: 15px;
    }

    .row label {
        margin-right: 15px;
        font-size: 14pt;
    }

    #start_day, #start_month, #start_year, #end_day, #end_month, #end_year {
        width: 8%;
        font-family: sans;
    }
</style>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            گزارشات
        </h2>

        <hr>
        <form id="order" action="adminstat/order" method="post">
            <div class="row">
                <h3>
                    تاریخ شروع
                </h3>
                <label for="start_day">
                    روز:
                </label>
                <select name="start_day" id="start_day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <label for="start_month">
                    ماه:
                </label>
                <select name="start_month" id="start_month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <label for="start_year">
                    سال:
                </label>
                <select name="start_year" id="start_year">
                    <?php
                    $this_year = Model::jalaliDate('Y');
                    for ($i = 1360; $i <= $this_year; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <h3>
                    تاریخ پایان
                </h3>
                <label for="end_day">
                    روز:
                </label>
                <select name="end_day" id="end_day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <label for="end_month">
                    ماه:
                </label>
                <select name="end_month" id="end_month">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <label for="end_year">
                    سال:
                </label>
                <select name="end_year" id="end_year">
                    <?php
                    $this_year = Model::jalaliDate('Y');
                    for ($i = 1360; $i <= $this_year; $i++) {
                        ?>
                        <option>
                            <?= $i ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <span onclick="submitForm('order')" class="btn-pejhva-primary">
                    گرفتن گزارش
                </span>
            </div>
        </form>

        <script>
            function submitForm(form_id) {
                $('#' + form_id).submit();
            }

            /*$('.selectTik').click(function () {
                $(this).find('.checkBoxManual').toggleClass('selectCheck');
            });*/
        </script>
    </div>
</div>