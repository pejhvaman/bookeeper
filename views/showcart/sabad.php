<style>
    .choose_option {
        width: 80px;
        height: 40px;
        border-radius: 8px;
        border: 1px solid #e9e9e9;
        /*margin-bottom: 50px;*/
        background: #f9f9f9;
        cursor: pointer;
        position: relative;
        text-align: center;
    }

    .choose_option::after {
        content: '';
        display: block;
        width: 16px;
        height: 16px;
        top: 13px;
        right: 10px;
        position: absolute;
    }

    .choose_option::before {
        content: '';
        display: block;
        width: 16px;
        height: 16px;
        background: url(public/images/chevron-arrow-down.png) no-repeat center;
        top: 13px;
        left: 10px;
        position: absolute;
    }

    .choose_option .option_selected {
        color: #6f6f6f;
        font-size: 13.5pt;
        line-height: 40px;
    }

    .choose_option .nashers {
        padding: 0;
        border-radius: 5px;
        border: 1px solid #e9e9e9;
        background: #f9f9f9;
        margin-top: 4px;
        display: none;
        position: relative; /* remember this trick!:position relative + z-index */
        z-index: 4;
    }

    .choose_option .nashers li {
        text-align: center;
        color: #6f6f6f;
        font-size: 11pt;
        cursor: pointer;
    }

    #sabade_kharid_title {
        width: 100%;
        color: #6f6f6f;
        font-size: 16pt;
        float: right;
        font-family: sans;
    }

    #sabad {
        width: 75%;
        float: right;
        /*border: 1px solid #e9e9e9;*/
        font-family: sans;
        color: #6f6f6f;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    #sabad table {
        background: white;
        width: 100%;
        margin: auto;
        border: 1px solid #e9e9e9;

    }

    #sabad table tr td:first-child {
        width: 45px;
    }

    #sabad table td {
        height: 200px;

    }

    #sabad table tr:not(:first-child) td {
        border-top: 1px solid #e9e9e9;
    }

    #sabad .right_img {
        width: 130px;
        height: 100%;
        float: right;
        vertical-align: middle;
    }

    #sabad .left_title {
        float: right;
        width: 230px;
        height: 100%;
        margin-right: 20px;
    }

    .left_title p:first-child {
        margin-top: 40px;
    }

    #sabad img {
        max-width: 130px;
        float: right;
        margin-top: 15px;
        border-radius: 4px;
    }

    .delete_prod {
        display: block;
        width: 24px;
        height: 24px;
        margin: auto;
        position: relative;
        background: url(public/images/x-button.png) no-repeat center;
        cursor: pointer;
    }

    .one_price, .all_price {
        font-size: 13pt;
    }
</style>
<div id="sabade_kharid_title">
    سبد خرید
</div>
<div id="sabad">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <span class="delete_prod"></span>
            </td>
            <td style="width: 380px">
                <div class="right_img">
                    <img src="public/images/taun1.jpg">
                </div>
                <div class="left_title">
                    <p>
                        نام کتاب
                    </p>
                    <p>
                        نویسنده
                    </p>
                    <p>
                        انتشارات
                    </p>
                </div>
            </td>
            <td>
                <div class="choose_option">
                <span class="option_selected">
                    1
                </span>
                    <ul class="nashers">
                        <li>
                            1
                        </li>
                        <li>
                            2
                        </li>
                        <li>
                            3
                        </li>
                        <li>
                            4
                        </li>
                        <li>
                            5
                        </li>
                        <li>
                            6
                        </li>
                        <li>
                            7
                        </li>
                        <li>
                            8
                        </li>
                        <li>
                            9
                        </li>
                        <li>
                            10
                        </li>
                    </ul>
                </div>
            </td>
            <td class="one_price">
                مبلغ واحد:
                <br>
                30,000
            </td>
            <td class="all_price">
                مبلغ کل:
                <br>
                30,000
            </td>
        </tr>
    </table>
</div>
<script>
    $('.choose_option').click(function () {
        $(this).find('.nashers').slideToggle(100);
    });

    $('.nashers li').click(function () {
        var textOpt = $(this).text();
        $('.option_selected').text(textOpt);
    });
</script>