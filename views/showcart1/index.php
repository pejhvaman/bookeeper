
<style>

    #sabade_kharid_title {
        width: 100%;
        color: #6f6f6f;
        font-size: 16pt;
        float: right;
        font-family: sans;
    }

</style>
<?php
require ('rahgiri.php');
?>
    <div id="sabade_kharid_title">
        انتخاب آدرس تحویل سفارش

        <span class="addBtn"
              style="width: 140px;height: 40px;float: left;line-height: 40px;margin-bottom: 8px;margin-left: 325px;font-size: 14pt">
            افزودن آدرس جدید
        </span>
    </div>
    <script>
        $('#sabade_kharid_title .addBtn').click(function () {
            $('#dark').fadeIn(100);
            $('#add_address').fadeIn(100);
        });
    </script>
<?php
require ('right_side.php');
require ('goto_next.php');
require('popup.php');
?>

