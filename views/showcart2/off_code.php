<style>
    .off_coding {
        width: 100%;
        float: right;
        background: white;
        border: 1px solid #e9e9e9;
        padding-bottom: 30px;
        margin-top: 50px;
    }

    .off_coding p {
        font-size: 16pt;
        font-family: sans;
        color: #6f6f6f;
        margin-right: 30px;
        margin-bottom: 0;
    }

    .off_coding span {
        font-family: sans;
        font-size: 12pt;
        margin-right: 30px;
        color: #4b4b4b;
    }

    .off_coding input {
        width: 220px;
        height: 35px;
        border: 1px solid #e9e9e9;
        border-radius: 4px;
        margin-right: 25px;
        padding-right: 8px;
        color: #6f6f6f;
    }

    .off_coding .addBtn {
        width: 150px;
        height: 36px;
        line-height: 36px;
        color: white;
        font-size: 12.5pt;
        float: left;
        margin-right: 0;
        margin-left: 65px;

    }
</style>
<div class="off_coding">
    <p>
        استفاده از کد تخفیف
    </p>
    <span>
                با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می‌شود.
            </span>
    <input id="code_input" name="off_code">
    <span onclick="checkCode()" class="addBtn">
                ثبت کد تخفیف
    </span>
</div>
<script>
    $('#code_input').css({"border": "2px solid orange"});
    $('#code_input').attr('placeholder', 'کد تخفیف خود را وارد کنید...');
    //$('#code_input').attr('value', '');

    function checkCode() {
        var code = $('#code_input').val();
        var url = "showcart2/checkcode/" + code;
        var data = {};
        $.post(url, data, function (msg) {

            var response = parseInt(msg);
            //console.log(response);
            if (response != 0) {
                $('#code_input').css({"border": "4px solid green"});
                //$('#final_price').html(finalPrice);
                calculateFinalPrice();
            }
            else {
                // var codeInput = ;
                $('#code_input').css({"border": "4px solid red"});
                $('#code_input').attr('placeholder', 'کد تخفیف خود را صحیح وارد کنید...');
                //calculateFinalPrice();
            }
        });
    }

    function calculateFinalPrice() {

        var code = $('#code_input').val();
        var url = "showcart2/calculatefinalprice/" + code;
        var data = {};
        $.post(url, data, function (msg) {
            //alert(msg);
            // console.log(msg);
            $('#final_price').html(msg);
        });
    }

    calculateFinalPrice();
</script>