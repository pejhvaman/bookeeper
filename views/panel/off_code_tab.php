<style>
    #off_code {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #off_code > table {
        width: 1243px;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    #off_code > table > tbody > tr {
        width: 100%;
        height: 45px;
    }

    #off_code table > tbody > tr > td {

        text-align: center;
        border-left: 1px solid #e9e9e9;
        border-top: 1px solid #e9e9e9;
    }

    #off_code table > tbody > tr > td:last-child {
        border-left: unset;
    }

    #off_code table > tbody > tr.last > td {
        border-bottom: unset !important;
    }

    #off_code table > tbody > tr:first-child > td {
        border-top: unset !important;
    }

    #off_code table > tbody > tr:first-child {
        background: #fbfbfb;
    }

    #add_off_code {
        width: 100%;
        float: right;
        margin-bottom: 30px;
    }

    #add_off_code p {
        color: #6f6f6f;
        font-size: 14pt;
        float: right;
        margin: 3px 0 0 0;
    }

    #add_off_code input {
        float: right;
        margin-right: 20px;
        width: 220px;
        height: 32px;
        border: 1px solid #e9e9e9;
        border-radius: 5px;
    }

    #add_off_code .addBtn {
        width: 80px;
        height: 33px;
        line-height: 32px;
        margin-right: 20px;
        float: right;
        margin-top: 1px;
        border-radius: 4px;
    }
</style>
<section id="off_code" style="<?php if($activeTab == 'code'){echo 'display:block;';} ?>">
    <div id="add_off_code">
        <p>
            افزودن کد تخفیف:
        </p>
        <input id="code_takhfif" name="code">
        <span onclick="saveCode()" class="addBtn">
                 افزودن
            </span>
    </div>
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                کد تخفیف
            </td>
            <td>
                تاریخ ثبت
            </td>
            <td>
                تاریخ انقضا
            </td>
            <td>
                وضعیت
            </td>
            <td>
                جزئیات
            </td>
        </tr>
        <?php
        $codes = $data['codes'];
        $i = 1;
        foreach ($codes as $code) {
            ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $code['kod'] ?>
                </td>
                <td>
                    <?= $code['sabt_time'] ?>
                </td>
                <td>
                    <?= $code['end_time'] ?>
                </td>
                <td>
                    <?= $code['status'] ?>
                </td>
                <td>
                    <span class="more_detail"></span>
                </td>
            </tr>
            <tr class="more_detail_order">
                <td colspan="10">
                    <div class="all_detail">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    سفارش
                                </td>
                                <td>
                                    تاریخ خرید
                                </td>
                            </tr>
                            <?php
                            $sabad = $code['order_info']['sabad'];
                            $sabad = unserialize($sabad);

                            foreach ($sabad as $item) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $item['esm'] ?>
                                    </td>
                                    <td>
                                        <?= $code['order_info']['sabt_time_sh'] ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
</section>
<script>
    function saveCode() {
        var code = $('#code_takhfif').val();
        var url = 'panel/savecode';
        var data = {'code': code};
        $.post(url, data, function (msg) {
            window.location = 'panel/index/code';
        });
    }
</script>