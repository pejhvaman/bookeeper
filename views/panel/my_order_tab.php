<style>
    #my_order {
        width: 100%;
        float: right;
    }

    #my_order > table {
        width: 1245px;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    #my_order > table > tbody > tr {
        width: 100%;
        height: 45px;
    }

    #my_order table > tbody > tr > td {
        width: 12%;
        text-align: center;
        border-left: 1px solid #e9e9e9;
        border-top: 1px solid #e9e9e9;
    }

    #my_order table > tbody > tr > td:last-child {
        border-left: unset;
    }

    #my_order table > tbody > tr.last > td {
        border-bottom: unset !important;
    }

    #my_order table > tbody > tr:first-child > td {
        border-top: unset !important;
    }

    #my_order table > tbody > tr:first-child {
        background: #fbfbfb;
    }

    .more_detail {
        display: block;
        width: 16px;
        height: 16px;
        line-height: 45px;
        margin: auto;
        cursor: pointer;
        background: url(public/images/chevron-arrow-down.png) no-repeat center;
    }

    .close_detail {
        background: url(public/images/chevron-arrow-up.png) no-repeat center !important;
    }

    .more_detail_order {
        display: none;
    }

    .more_detail_order > td {
        border: 4px inset #e9e9e9 !important;
        width: 100%;
    }

    .all_detail {
        width: 1193px;
        float: right;
        padding: 20px;
    }

    .all_detail > table {
        width: 100%;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    .all_detail > table tr {
        width: 100%;
        height: 40px;
    }

</style>
<section id="my_order">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                کد
            </td>
            <td>
                تاریخ
            </td>
            <td>
                مبلغ کل
            </td>
            <td>
                وضعیت
            </td>
            <td>
                عملیات پرداخت
            </td>
            <td>
                جزئیات
            </td>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                12345
            </td>
            <td>
                10 مهر 97
            </td>
            <td>
                25.000
            </td>
            <td>
                تحویل شده
            </td>
            <td>
                پرداخت
            </td>
            <td>
                <span class="more_detail"></span>
            </td>
        </tr>
        <tr class="more_detail_order">
            <td colspan="8">
                <div class="all_detail">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                کالا
                            </td>
                            <td>
                                تعداد
                            </td>
                            <td>
                                قیمت واحد
                            </td>
                            <td>
                                قیمت کل
                            </td>
                            <td>
                                تخفیف کل
                            </td>
                            <td>
                                مبلغ کل
                            </td>
                        </tr>
                        <tr>
                            <td>
                                نام کالا
                            </td>
                            <td>
                                x
                            </td>
                            <td>
                                x
                            </td>
                            <td>
                                x
                            </td>
                            <td>
                                x
                            </td>
                            <td>
                                x
                            </td>
                        </tr>
                    </table>
                    <style>
                        .rahgiri {
                            width: 91.55%;
                            padding: 50px;
                            float: right;
                        }

                        .rahgiri > div {
                            margin: auto;
                        }

                        .dashed {
                            width: 65px;
                            height: 2px;
                            float: right;
                        }

                        .dashed span {
                            display: block;
                            width: 10px;
                            height: 2px;
                            margin-left: 5px;
                            float: right;
                            background: #67bfb0;
                        }

                        .dashed span:last-child {
                            margin-left: 10px;
                        }

                        .steps {
                            float: right;
                            width: 645px;
                            padding: 0;
                        }

                        .steps li {
                            width: 150px;

                            float: right;
                            position: relative;
                        }

                        .steps li .circle {
                            display: block;
                            width: 25px;
                            height: 25px;
                            border-radius: 100%;
                            border: 5px solid #e9e9e9;
                            position: relative;
                            top: -16px;
                        }

                        .steps li.done .circle {
                            background: #67bfb0 url(public/images/tick1.png) no-repeat center !important;
                            border: 5px solid #67bfb0 !important;
                        }

                        .steps li.doing .circle {
                            border: 5px solid #67bfb0 !important;
                        }

                        .steps .line {
                            display: block;
                            float: left;
                            margin: 0 15px 0 8px;
                            width: 100px;
                            height: 2px;
                            background: #e9e9e9;
                            position: relative;
                            top: -34px;
                        }

                        .steps li.done .line {
                            background: #67bfb0;
                        }

                        .steps .step_title {
                            position: absolute;
                            right: -12px;
                            top: 20px;
                            font-size: 10.5pt;
                            color: #6f6f6f;
                        }

                        .steps li.done .step_title {
                            color: #67bfb0;
                        }

                        .steps li.doing .step_title {
                            color: #67bfb0;
                        }
                    </style>
                    <div class="rahgiri">
                        <div>
                            <div class="dashed" style="margin-right: 165px">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <ul class="steps">
                                <li class="done">
                                    <span class="circle"></span>
                                    <span class="line"></span>
                                    <span class="step_title">
                                                    تایید سفارش
                                                </span>
                                </li>
                                <li class="doing">
                                    <span class="circle"></span>
                                    <span class="line"></span>
                                    <span class="step_title" style="right: 0">
                                                     پرداخت
                                                </span>
                                </li>
                                <li>
                                    <span class="circle"></span>
                                    <span class="line"></span>
                                    <span class="step_title">
                                                     پردازش انبار
                                                </span>
                                </li>
                                <li>
                                    <span class="circle"></span>
                                    <span class="line"></span>
                                    <span class="step_title">
                                                      آماده ارسال
                                                </span>
                                </li>
                                <li style="width: 42px">
                                    <span class="circle"></span>
                                    <span class="step_title">
                                                     تحویل شده
                                                </span>
                                </li>
                            </ul>
                            <div class="dashed">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <style>
                        .table3 tr:first-child td {
                            background: white;
                        }

                        .onvan3 {
                            color: #67bfb0;
                        }
                    </style>
                    <table class="table3" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                            <span class="onvan3">
                                                آدرس تحویل:
                                            </span>
                                <span>
                                                تبریز-خوابگاه فجر
                                            </span>
                            </td>
                            <td>
                                            <span class="onvan3">
                                                نام تحویل گیرنده:
                                            </span>
                                <span>
                                                 پژمان یزدان خواه
                                            </span>
                            </td>
                            <td>
                                            <span class="onvan3">
                                                 شماره تلفن:
                                            </span>
                                <span>
                                                 09375580582
                                            </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <!--
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    12345
                                </td>
                                <td>
                                    10 مهر 97
                                </td>
                                <td>
                                    25.000
                                </td>
                                <td>
                                    تحویل شده
                                </td>
                                <td>
                                    پرداخت
                                </td>
                                <td>
                                    سفارش
                                </td>
                                <td>
                                    <span class="more_detail"></span>
                                </td>
                            </tr>-->
    </table>
</section>