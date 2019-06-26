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
    <input id="code_input">
    <span onclick="checkCode()" class="addBtn">
                ثبت کد تخفیف
    </span>
</div>
<script>
    function checkCode() {
        var code = $('#code_input').val();
        var url = "showcart2/checkcode";
        var data = {'code': code};
        $.post(url, data, function (msg) {
            //var finalPrice = parseInt(msg[1]);
            var response = parseInt(msg[0]);
            if (response != 0) {
                $('#code_input').css({"border": "1px solid blue"});
                //$('#final_price').html(finalPrice);
                var url = "showcart2/calculatefinalprice";
                var data = {'codeTakhfif': code};
                $.post(url, data, function (msg) {
                   //alert(msg);
                   // console.log(msg);
                    $('#final_price').html(msg);
                }, 'json');
            } else {
                // var codeInput = ;
                $('#code_input').css({"border": "1px solid orange"});
                $('#code_input').attr('placeholder','کد تخفیف خود را وارد کنید...');
                var url = "showcart2/calculatefinalprice";
                var data = {'codeTakhfif': code};
                $.post(url, data, function (msg) {
                    //alert(msg);
                    // console.log(msg);
                    $('#final_price').html(msg);
                }, 'json');
            }
        }, 'json');
    }

    checkCode();
</script>