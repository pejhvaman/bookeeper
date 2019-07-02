<style>

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
        height: 70px;
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

    #send_type .select_but.activeAddress {
        border: 3px solid #67bfb0 !important;
        background: white url(public/images/check-mark1.png) no-repeat center;
    }

    input[name=pay_type] {
        display: none;
    }
</style>
<div class="right_side">
    <div id="sabad">

        <table cellspacing="0" cellpadding="0">
            <tr>
                <td class="choose_button" width="50px">
                    <span class="select_but"></span>
                    <input type="checkbox" name="pay_type" value="1">
                </td>
                <td width="60px">
                    <i></i>
                </td>
                <td class="editendelete">
                    پرداخت اینترنتی(درگاه زرین پال)
                </td>
            </tr>

        </table>

    </div>
    <?php
    require('off_code.php');
    ?>
    <script>
        $('#sabad table').eq(0).find('.select_but').addClass('activeAddress');
        $('#sabad table').eq(0).find('input[name=pay_type]').attr('checked', true);

        $('#sabad .select_but').click(function () {
            //$(this).toggleClass('activeAddress');
            $('#sabad .select_but').removeClass('activeAddress');
            $(this).addClass('activeAddress');
            var parentTag = $(this).parents('.choose_button');
            var radioInputs = $('input[name=pay_type');
            radioInputs.attr('checked', false);
            var radioInput = parentTag.find('input[name=pay_type]');
            radioInput.attr('checked', true);
        });
    </script>
</div>
