<style>
    #add_address {
        width: 800px;
        height: 630px;
        background: white;
        position: absolute;
        top: 10px;
        right: 280px;
        z-index: 15;
        display: none;
    }

    .roww {
        width: 100%;
        height: 100px;
        float: right;
    }

    #title_adding {
        display: block;
        float: right;
        color: #6f6f6f;
        font-family: sans;
        font-size: 16pt;
        width: 600px;
        height: 45px;
        line-height: 45px;
        background: #f9f9f9;
        margin-right: 30px;
        margin-top: 30px;
        padding-right: 10px;
    }

    #close_page {
        display: block;
        float: left;
        width: 45px;
        height: 45px;
        margin-left: 30px;
        margin-top: 30px;
        border: 1px solid #d7d7d7;
        border-radius: 100%;
        background: url(public/images/x-button2.png) no-repeat center;
        cursor: pointer;
    }

    .roww_right, .roww_left {
        width: 350px;
        height: 100%;
        float: right;
        margin-right: 30px;
    }

    .roww p {
        font-family: sans;
        font-size: 14pt;
        font-weight: normal;
        color: #6f6f6f;
        margin-bottom: 0;
    }

    .roww_right input, .roww_left input {
        width: 320px;
        height: 45px;
        border: 1px solid #d7d7d7;
        border-radius: 4px;
        padding-right: 8px;
        font-family: sans;
        font-size: 13pt;
        color: #9c9c9c;
    }

    .roww_left input {
        direction: ltr;
        padding-right: 0;
        padding-left: 8px;
    }

    .roww textarea {
        width: 91%;
        height: 100px;
        border: 1px solid #d7d7d7;
        border-radius: 4px;
        padding-right: 8px;
        padding-top: 8px;
        font-size: 12pt;
        font-family: sans;
    }

    .roww > input {
        width: 91%;
        height: 45px;
        border: 1px solid #d7d7d7;
        border-radius: 4px;
        padding-right: 8px;
        font-family: sans;
        font-size: 13pt;
        color: #9c9c9c;
    }

    .roww .addBtn {
        width: 250px;
        float: right;
        margin-right: 30px;
        height: 50px;
        line-height: 50px;
        font-size: 16pt;
    }

    #add_address select {
        font-family: sans;
        width: 330px;
        height: 50px;
        border-radius: 4px;
    }
</style>
<form id="addressForm" action="showcart1/addtoaddress" method="post">
    <div id="add_address">
        <div class="roww">
        <span id="title_adding">
            افزودن آدرس جدید
        </span>
            <span id="close_page"></span>
        </div>
        <div class="roww">
            <div class="roww_right">
                <p>
                    نام و نام خانوادگی تحویل گیرنده
                </p>
                <input name="nam" placeholder="نام تحویل گیرنده را وارد نمایید">
            </div>
            <div class="roww_left">
                <p>
                    شماره موبایل
                </p>
                <input name="shomare" placeholder="09xxxxxxxxx">
            </div>
        </div>
        <div class="roww">
            <div class="roww_right">
                <p>
                    استان
                </p>
                <select id="ostan_select" class="ostan_select" name="state" onchange="ostan(this)" title="انتخاب استان">
                    <option value="">
                        انتخاب استان
                    </option>
                    <option data-val="1" value="تهران">
                        تهران
                    </option>
                    <option data-val="2" value="آذربایجان غربی">
                        آذربایجان غربی
                    </option>
                </select>
            </div>
            <div class="roww_left">
                <p>
                    شهر
                </p>
                <span class="shahr">
                <select name="shahr" title="انتخاب شهر">
                    <option value="">
                    انتخاب شهر
                    </option>
                </select>
            </span>
            </div>
        </div>
        <div style="width: 96%;float: left;height: 140px" class="roww">
            <p>
                آدرس پستی
            </p>
            <textarea name="adres" placeholder="آدرس تحویل گیرنده را وارد نمایید"></textarea>
        </div>
        <div class="roww" style="width: 96%;float: left;">
            <p>
                کد پستی
            </p>
            <input name="kodposti" placeholder="کد پستی را بدون خط تیره بنویسید">
        </div>
        <div class="roww" style="height: 60px">
        <span id="submitTheAddress" onclick="submitAddressForm()" class="addBtn sans">
            ثبت اطلاعات وارد شده
        </span>
        </div>
    </div>
</form>

<script>
    function submitAddressForm() {
        //alert('');
        var url = 'showcart1/addtoaddress';
        var data = $('#addressForm').serializeArray();
        $.post(url, data, function (msg) {
            console.log(msg);
        },'json');
    }

    function ostan(tag) {
        var id = $(tag).find('option:selected').attr('data-val');
        var arr = new Array();
        if (id == 1) {
            arr = ['تبریز', 'مراغه', 'آذرشهر', 'مرند'];
        }//if
        if (id == 2) {
            arr = ['ارومیه', 'مهاباد', 'خوی', 'میاندوآب', 'اشنویه'];
        }//if
        $('.shahr').find('select option').remove();
        var k = 0;
        if (arr.length > 0) {
            for (k = 0; k < arr.length; k++) {
                $('.shahr').find('select').append($('<option>', {text: arr[k], value: arr[k]}));
            }//for
        }//if
    }//function ostan


    $('#close_page').click(function () {
        $('#dark').fadeOut(100);
        $(this).parents('#add_address').fadeOut(100);
    });
    /*$('#submitTheAddress').click(function () {
        $('#dark').fadeOut(100);
        $('#add_address').fadeOut(100);
    });*/
</script>
<style>
    #dark {
        width: 100%;
        height: 100%;
        float: right;
        background: rgba(147, 147, 147, 0.46);
        position: fixed;
        top: 0;
        right: 0;
        display: none;
        z-index: 10;
    }
</style>
<div id="dark">

</div>