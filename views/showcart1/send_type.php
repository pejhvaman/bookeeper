<style>
    #send_type {
        width: 100%;
        float: right;
        font-family: sans;
        color: #6f6f6f;
    }

    #send_type table {
        width: 100%;
        background: white;
        border: 1px solid #e9e9e9;
        margin-bottom: 8px;
    }

    #send_type table tr {
        width: 100%;
        height: 100px;
    }

    #send_type span {
        display: block;
        text-align: center;
    }

    #send_type_title {
        width: 100%;
        float: right;
        margin-top: 50px;
        margin-bottom: 10px;
        font-family: sans;
        font-size: 16pt;
        color: #6f6f6f;
    }

    #send_type i {
        display: block;
        float: right;
        width: 64px;
        margin-left: 15px;
        height: 64px;
        background: url(public/images/mailbox.png) no-repeat center;
    }
     #send_type .select_but.activeAddress {
         border: 3px solid #67bfb0 !important;
         background: white url(public/images/check-mark1.png) no-repeat center;
     }
    #send_type table:first-child .select_but{

    }
</style>
<?php
$post_types = $data['post_types'];
?>
<div id="send_type_title">
    شیوه ارسال سفارش
</div>
<div id="send_type">
    <?php
    foreach ($post_types as $post_type):
    ?>
    <table class="post_type_block" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50px">
                <span onclick="" data-idposttype="<?= $post_type['id'] ?>" class="select_but"></span>
            </td>
            <td>
                <i></i>
                <p><?= $post_type['title'] ?></p>
                <p><?= $post_type['tozih'] ?></p>
            </td>
            <td width="150px" style="border-right: 1px solid #e9e9e9">
                    <span>
                        هزینه ارسال
                    </span>
                <span>
                        <?= $post_type['hazine'] ?>
                        هزار تومان
                    </span>
            </td>
        </tr>
    </table>
    <?php
    endforeach;
    ?>
    <script>
        $('#send_type table').eq(0).find('.select_but').addClass('activeAddress');

        $('#send_type .select_but').click(function () {
            //$(this).toggleClass('activeAddress');
            $('#send_type .select_but').removeClass('activeAddress');
            $(this).addClass('activeAddress');
            updateTotPriceOnChosenPostType();

        });

        function updateTotPriceOnChosenPostType() {
            var activeButton = $('#send_type .select_but.activeAddress');
            var idPostType = activeButton.attr('data-idposttype');
            //var activePostType = activeButton.parents('table.post_type_block');
            //var idAddress = activeTable.attr('data-id');
            var url = "showcart1/updatetotprice_sessionnewtotprice";
            var data = {'id_post_type':idPostType};
            $.post(url, data, function (msg) {
                console.log(msg);
                var postTypePrice = parseInt(msg[0]);
                var totPricePrev = parseInt(msg[1]);

                var totPriceTag = $('#goto_next #tot_price');
                var newTotPrice = postTypePrice + totPricePrev;
                totPriceTag.html(newTotPrice);
            }, 'json');
        }
        updateTotPriceOnChosenPostType();
    </script>

</div>