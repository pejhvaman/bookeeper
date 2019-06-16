<style>
    #add_address {
        width: 800px;
        height: 630px;
        background: white;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto auto;
        z-index: 15;
        display: none;
        overflow-y: hidden;
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
                <select id="ostan_select" class="ostan_select" name="state" onchange="Ostan(this)" title="انتخاب استان">
                    <option value="">
                        انتخاب استان
                    </option>
                    <option data-val="1" value="آذربايجان شرقي">
                        آذربايجان شرقي
                    </option>
                    <option data-val="2" value="آذربايجان غربي">
                        آذربايجان غربي
                    </option>
                    <option data-val="3" value="اردبيل">
                        اردبيل
                    </option>
                    <option data-val="4" value="اصفهان">
                        اصفهان
                    </option>
                    <option data-val="5" value="ايلام">
                        ايلام
                    </option>
                    <option data-val="6" value="بوشهر">
                        بوشهر
                    </option>
                    <option data-val="7" value="تهران">
                        تهران
                    </option>
                    <option data-val="8" value="چهارمحال و بختياري">
                        چهارمحال و بختياري
                    </option>
                    <option data-val="9" value="خراسان جنوبي">
                        خراسان جنوبي
                    </option>
                    <option data-val="10" value="خراسان رضوي">
                        خراسان رضوي
                    </option>
                    <option data-val="11" value="خراسان شمالي">
                        خراسان شمالي
                    </option>
                    <option data-val="12" value="خوزستان">
                        خوزستان
                    </option>
                    <option data-val="13" value="زنجان">
                        زنجان
                    </option>
                    <option data-val="14" value="سمنان">
                        سمنان
                    </option>
                    <option data-val="15" value="سيستان و بلوچستان">
                        سيستان و بلوچستان
                    </option>
                    <option data-val="16" value="فارس">
                        فارس
                    </option>
                    <option data-val="17" value="قزوين">
                        قزوين
                    </option>
                    <option data-val="18" value="قم">
                        قم
                    </option>
                    <option data-val="19" value="کردستان">
                        کردستان
                    </option>
                    <option data-val="20" value="کرمان">
                        کرمان
                    </option>
                    <option data-val="21" value="کرمانشاه">
                        کرمانشاه
                    </option>
                    <option data-val="22" value="کهگيلويه و بويراحمد">
                        کهگيلويه و بويراحمد
                    </option>
                    <option data-val="23" value="گلستان">
                        گلستان
                    </option>
                    <option data-val="24" value="گيلان">
                        گيلان
                    </option>
                    <option data-val="25" value="لرستان">
                        لرستان
                    </option>
                    <option data-val="26" value="مازندران">
                        مازندران
                    </option>
                    <option data-val="27" value="مرکزي">
                        مرکزي
                    </option>
                    <option data-val="28" value="هرمزگان">
                        هرمزگان
                    </option>
                    <option data-val="29" value="همدان">
                        همدان
                    </option>
                    <option data-val="30" value="يزد">
                        يزد
                    </option>
                </select>
            </div>

            <div class="roww_left">
                <p>
                    شهر
                </p>
                <span class="shahr">
                <select id="shahr_select" class="shahr_select" name="shahr" title="انتخاب شهر">
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


    /*function ostan(tag) {
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
    }//function ostan*/


    /*function Shahr(tag) {
        var index = $(tag).find('option:selected').val();
        $('input[name="shahr"]').val(index);
    }

    function Shahr2() {
        var index = $('#shahr').find('option:first-child').val();
        var id = $('#shahr').find('option:first-child').attr('id');
        if (id == 0) {
            $('input[name="shahr"]').val('انتخاب شهر');
        } else {
            $('input[name="shahr"]').val(index);
        }
    }*/


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
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto auto;
        display: none;
        z-index: 10;
    }
</style>
<div id="dark">

</div>
<script>
    var editAddressId = "";
    function submitAddressForm() {
        //alert('');
        var url = 'showcart1/addtoaddress/' + editAddressId;
        var data = $('#addressForm').serializeArray();
        $.post(url, data, function (msg) {
            console.log(msg);
            //window.location = 'showcart1';
        });
    }

    function Ostan(tag) {
        //alert('');
        var id = $(tag).find('option:selected').attr('data-val');
        //var text = $(tag).find('option:selected').val();
        var arr = new Array();
        if (id == 1) {
            arr = ['انتخاب شهر', 'آذرشهر', 'اسکو', 'اهر', 'بستان‌آباد', 'بناب', 'تبريز', 'جلفا', 'چاراويماق', 'سراب', 'شبستر', 'عجب‌شير', 'کليبر', 'مراغه', 'مرند', 'ملکان', 'ميانه', 'ورزقان', 'هريس', 'هشترود'];
        }//if
        if (id == 2) {
            arr = ['انتخاب شهر', 'اروميه', 'اشنويه', 'بوکان', 'پيرانشهر', 'تکاب', 'چالدران', 'خوي', 'سردشت', 'سلماس', 'شاهين‌دژ', 'ماکو', 'مهاباد', 'مياندوآب', 'نقده'];
        }//if
        if (id == 3) {
            arr = ['انتخاب شهر', 'اردبيل', 'بيله‌سوار', 'پارس‌آباد', 'خلخال', 'کوثر', 'گِرمي', 'مِشگين‌شهر', 'نَمين', 'نير'];
        }//if
        if (id == 4) {
            arr = ['انتخاب شهر', 'آران و بيدگل', 'اردستان', 'اصفهان', 'برخوار و ميمه', 'تيران و کرون', 'چادگان', 'خميني‌شهر', 'خوانسار', 'سميرم', 'شهرضا', 'سميرم سفلي', 'فريدن', 'فريدون‌شهر', 'فلاورجان', 'کاشان', 'گلپايگان', 'لنجان', 'مبارکه', 'نائين', 'نجف‌آباد', 'نطنز']
        }
        if (id == 5) {
            arr = ['انتخاب شهر', 'آبدانان', 'ايلام', 'ايوان', 'دره‌شهر', 'دهلران', 'شيروان و چرداول', 'مهران']
        }
        if (id == 6) {
            arr = ['انتخاب شهر', 'بوشهر', 'تنگستان', 'جم', 'دشتستان', 'دشتي', 'دير', 'ديلم', 'کنگان', 'گناوه']
        }
        if (id == 7) {
            arr = ['انتخاب شهر', 'اسلام‌شهر', 'پاکدشت', 'تهران', 'دماوند', 'رباط‌کريم', 'ري', 'ساوجبلاغ', 'شميرانات', 'شهريار', 'فيروزکوه', 'کرج', 'نظرآباد', 'ورامين']
        }
        if (id == 8) {
            arr = ['انتخاب شهر', 'اردل', 'بروجن', 'شهرکرد', 'فارسان', 'کوهرنگ', 'لردگان']
        }
        if (id == 9) {
            arr = ['انتخاب شهر', 'بيرجند', 'درميان', 'سرايان', 'سربيشه', 'فردوس', 'قائنات', 'نهبندان']
        }
        if (id == 10) {
            arr = ['انتخاب شهر', 'بردسکن', 'تايباد', 'تربت جام', 'تربت حيدريه', 'چناران', 'خليل‌آباد', 'خواف', 'درگز', 'رشتخوار', 'سبزوار', 'سرخس', 'فريمان', 'قوچان', 'کاشمر', 'کلات', 'گناباد', 'مشهد', 'مه ولات', 'نيشابور']
        }
        if (id == 11) {
            arr = ['انتخاب شهر', 'اسفراين', 'بجنورد', 'جاجرم', 'شيروان', 'فاروج', 'مانه و سملقان']
        }
        if (id == 12) {
            arr = ['انتخاب شهر', 'آبادان', 'اميديه', 'انديمشک', 'اهواز', 'ايذه', 'باغ‌ملک', 'بندر ماهشهر', 'بهبهان', 'خرمشهر', 'دزفول', 'دشت آزادگان', 'رامشير', 'رامهرمز', 'شادگان', 'شوش', 'شوشتر', 'گتوند', 'لالي', 'مسجد سليمان', 'هنديجان']
        }
        if (id == 13) {
            arr = ['انتخاب شهر', 'ابهر', 'ايجرود', 'خدابنده', 'خرمدره', 'زنجان', 'طارم', 'ماه‌نشان']
        }
        if (id == 14) {
            arr = ['انتخاب شهر', 'دامغان', 'سمنان', 'شاهرود', 'گرمسار', 'مهدي‌شهر']
        }
        if (id == 15) {
            arr = ['انتخاب شهر', 'ايرانشهر', 'چابهار', 'خاش', 'دلگان', 'زابل', 'زاهدان', 'زهک', 'سراوان', 'سرباز', 'کنارک', 'نيک‌شهر']
        }
        if (id == 16) {
            arr = ['انتخاب شهر', 'آباده', 'ارسنجان', 'استهبان', 'اقليد', 'بوانات', 'پاسارگاد', 'جهرم', 'خرم‌بيد', 'خنج', 'داراب', 'زرين‌دشت', 'سپيدان', 'شيراز', 'فراشبند', 'فسا', 'فيروزآباد', 'قير و کارزين', 'کازرون', 'لارستان', 'لامِرد', 'مرودشت', 'ممسني', 'مهر', 'ني‌ريز']
        }
        if (id == 17) {
            arr = ['انتخاب شهر', 'آبيک', 'البرز', 'بوئين‌زهرا', 'تاکستان', 'قزوين']
        }
        if (id == 18) {
            arr = ['انتخاب شهر', 'قم']
        }
        if (id == 19) {
            arr = ['انتخاب شهر', 'بانه', 'بيجار', 'ديواندره', 'سروآباد', 'سقز', 'سنندج', 'قروه', 'کامياران', 'مريوان']
        }
        if (id == 20) {
            arr = ['انتخاب شهر', 'بافت', 'بردسير', 'بم', 'جيرفت', 'راور', 'رفسنجان', 'رودبار جنوب', 'زرند', 'سيرجان', 'شهر بابک', 'عنبرآباد', 'قلعه گنج', 'کرمان', 'کوهبنان', 'کهنوج', 'منوجان']
        }
        if (id == 21) {
            arr = ['انتخاب شهر', 'اسلام‌آباد غرب', 'پاوه', 'ثلاث باباجاني', 'جوانرود', 'دالاهو', 'روانسر', 'سرپل ذهاب', 'سنقر', 'صحنه', 'قصر شيرين', 'کرمانشاه', 'کنگاور', 'گيلان غرب', 'هرسين']
        }
        if (id == 22) {
            arr = ['انتخاب شهر', 'بويراحمد', 'بهمئي', 'دنا', 'کهگيلويه', 'گچساران']
        }
        if (id == 23) {
            arr = ['انتخاب شهر', 'آزادشهر', 'آق‌قلا', 'بندر گز', 'ترکمن', 'راميان', 'علي‌آباد', 'کردکوي', 'کلاله', 'گرگان', 'گنبد کاووس', 'مراوه‌تپه', 'مينودشت']
        }
        if (id == 24) {
            arr = ['انتخاب شهر', 'آستارا', 'آستانه اشرفيه', 'اَملَش', 'بندر انزلي', 'رشت', 'رضوانشهر', 'رودبار', 'رودسر', 'سياهکل', 'شَفت', 'صومعه‌سرا', 'طوالش', 'فومَن', 'لاهيجان', 'لنگرود', 'ماسال']
        }
        if (id == 25) {
            arr = ['انتخاب شهر', 'ازنا', 'اليگودرز', 'بروجرد', 'پل‌دختر', 'خرم‌آباد', 'دورود', 'دلفان', 'سلسله', 'کوهدشت']
        }
        if (id == 26) {
            arr = ['انتخاب شهر', 'آمل', 'بابل', 'بابلسر', 'بهشهر', 'تنکابن', 'جويبار', 'چالوس', 'رامسر', 'ساري', 'سوادکوه', 'v', 'گلوگاه', 'محمودآباد', 'نکا', 'نور', 'نوشهر']
        }
        if (id == 27) {
            arr = ['انتخاب شهر', 'آشتيان', 'اراک', 'تفرش', 'خمين', 'دليجان', 'زرنديه', 'ساوه', 'شازند', 'کميجان', 'محلات']
        }
        if (id == 28) {
            arr = ['انتخاب شهر', 'ابوموسي', 'بستک', 'بندر عباس', 'بندر لنگه', 'جاسک', 'حاجي‌آباد', 'شهرستان خمير', 'رودان', 'قشم', 'گاوبندي', 'ميناب']
        }
        if (id == 29) {
            arr = ['انتخاب شهر', 'اسدآباد', 'بهار', 'تويسرکان', 'رزن', 'کبودرآهنگ', 'ملاير', 'نهاوند', 'همدان']
        }
        if (id == 30) {
            arr = ['انتخاب شهر', 'ابرکوه', 'اردکان', 'بافق', 'تفت', 'خاتم', 'صدوق', 'طبس', 'مهريز', 'مِيبُد', 'يزد']
        }
        $('.shahr').find('select option').remove();
        //$('input[name="ostan"]').val(text);
        var k = 0;
        if (arr.length > 0) {
            for (k = 0; k < arr.length; k++) {
                $('.shahr').find('select').append($('<option>', {id: k, text: arr[k], value: arr[k]}));
            }//for
        }//if

        // Shahr2();
    }//function ostan

    $('#close_page').click(function () {
        $('#dark').fadeOut(100);
        $(this).parents('#add_address').fadeOut(100);
    });
</script>