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


    #sabad {
        width: 100%;
        float: right;
        /*border: 1px solid #e9e9e9;*/
        font-family: sans;
        color: #6f6f6f;
    }

    #sabad > table {
        background: white;
        width: 100%;
        margin: auto;
        border: 1px solid #e9e9e9;
        margin-bottom: 8px;
    }

    #sabad > table td {
        height: 40px;
    }

    .select_but {
        display: block;
        width: 50px;
        height: 50px;
        margin: auto;
        position: relative;
        right: -25px;
        border: 3px solid #dadada;
        border-radius: 50%;
        background: white;
        cursor: pointer;
    }

    #sabad .select_but.activeAddress {
        border: 3px solid #67bfb0 !important;
        background: white url(public/images/check-mark1.png) no-repeat center;
    }
</style>
<?php
$address = $data['address'];
?>
<div id="sabad">
    <?php
    foreach ($address as $item) {
        ?>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td rowspan="3" width="50px">
                    <span class="select_but"></span>
                </td>
                <td colspan="2">
                    <span class="title_add" style="font-size: 14pt;">
                        گیرنده:
                    </span>
                    <span class="value_add" style="font-size: 14pt;">
                    <?= $item['nam'] ?>
                    </span>
                </td>
                <td class="editendelete" rowspan="3" width="50px">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <span onclick="editAddress(<?= $item['id'] ?>)" class="edit_add"></span>
                            </td>
                        </tr>
                        <tr>
                            <td onclick="">
                                <span class="delete_add"></span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 220px">
                    <span class="title_add">
                        شماره تماس:
                    </span>
                    <span class="value_add">
                      <?= $item['shomare'] ?>
                    </span>
                </td>
                <td>
                    <span class="title_add">
                        کد پستی:
                    </span>
                    <span class="value_add">
                      <?= $item['kodposti'] ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height: 60px;vertical-align: top">

                        <span class="ostan_name">
                            <span>
                                استان
                            </span>
                            <span>
                                <?= $item['ostan'] ?>
                            </span>
                        </span>
                    ،
                    <span class="shahr_name">
                            <span>
                                شهر
                            </span>
                            <span>
                                <?= $item['shahr'] ?>
                            </span>
                        </span>
                    ،
                    <span class="posti_address">
                            <?= $item['adres'] ?>
                        </span>
                </td>
            </tr>
        </table>
        <?php
    }
    ?>
</div>
<script>

    function editAddress(addressId) {
        editAddressId = addressId;
        var url = 'showcart1/editaddress/' + addressId;
        var data = {};
        $.post(url, data, function (msg) {
            console.log(msg);
            $('#dark').fadeIn(100);
            $('#add_address').fadeIn(100);
            $('#addressForm').trigger("reset");
            $('#ostan_select').prop('selectedIndex', 0);
            $('#shahr_select').prop('selectedIndex', 0);
            $('input[name=nam]').val(msg['nam']);
            $('input[name=shomare]').val(msg['shomare']);
            $('textarea[name=adres]').val(msg['adres']);
            $('input[name=kodposti]').val(msg['kodposti']);
            var state = msg['ostan'];
            var city = msg['shahr'];
            $('.ostan_select option').each(function (index) {
                var statename = $(this).val();
                if (statename == state) {
                    console.log(statename);
                    //document.getElementById("ostan_select").selectedIndex = "2";
                    $(this).attr('selected', 'selected');
                    Ostan($('.ostan_select'));
                }
            });
            $('.shahr_select option').each(function (index) {
                var cityName = $(this).val();
                if (cityName == city) {
                    console.log(cityName);
                    //document.getElementById("ostan_select").selectedIndex = "2";
                    $(this).attr('selected', 'selected');
                    //Ostan($('.ostan_select'));
                }
            });
        }, 'json');
    }

    $('#sabad .select_but').click(function () {
        $(this).toggleClass('activeAddress');
        /*$('#sabad .select_but').removeClass('activeAddress');
        $(this).addClass('activeAddress');*/
    });


</script>