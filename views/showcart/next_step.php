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

    #goto_next {
        width: 300px;
        float: left;
        background: white;
        border: 1px solid #e9e9e9;
        font-family: sans;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    .row_s {
        width: 100%;
        float: right;
        font-size: 16pt;

    }

    .row_s p {
        text-align: center;
        margin: 0;
    }

    .row_s .addBtn {
        width: 245px;
        height: 48px;
        margin: auto;
        line-height: 48px;
        margin-bottom: 20px;
        font-size: 16pt;
        border-radius: 6px;
    }

</style>
<?php
$totPrice = $data['totPrice'];
?>
<div id="goto_next">
    <div class="row_s">
        <p style="color: #6f6f6f;margin-top: 20px">
            مبلغ قابل پرداخت
        </p>
        <p id="totPrice" style="color:#e54a86;margin-bottom: 20px">
            <?= $totPrice ?>
        </p>
        <p style="color: #6f6f6f;margin-top: 20px"> تومان</p>
    </div>
    <div class="row_s">
        <a onclick="sessionForTotPrice()" class="addBtn" href="showcart_registry">
            ادامه ثبت سفارش
        </a>
    </div>
    <script>

    </script>
</div>