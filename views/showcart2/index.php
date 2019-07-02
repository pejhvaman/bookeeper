<style>
    .addBtn {
        display: block;
        border-radius: 8px;
        /*width: 150px;
        height: 42px;*/
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        font-size: 12.5pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
    }

    .addBtn:hover {
        background-color: #4d8f84;
    }

    #sabade_kharid_title {
        width: 100%;
        color: #6f6f6f;
        font-size: 16pt;
        float: right;
        font-family: sans;
    }
</style>
<?php
require('rahgiri.php');
$status = $data['Status'];
if ($status != '') {
    ?>
    <style>
        .show_error {
            font-family: sans;
            float: right;
            padding: 10px;
            width: 97.5%;
            color: #ef2a45;
            border: 4px solid #ef2a45;
            text-align: center;
        }
    </style>
    <div class="show_error">
        خطا!
        <?php
        $errors_array = zarinpalErrors;
        $error = $errors_array[$status];
        echo $error;
        ?>
    </div>
    <?php
}
?>

<div id="sabade_kharid_title">
    انتخاب شیوه پرداخت
</div>
<form id="final_form" action="showcart2/saveorder" method="post">
    <?php
    require('right_side.php');
    require('goto_next.php');
    ?>
</form>


