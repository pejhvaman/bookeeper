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

</style>
<div id="send_type_title">
    شیوه ارسال سفارش
</div>
<div id="send_type">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td width="50px">
                <span class="select_but"></span>
            </td>
            <td>
                <i></i>
                <p>پست پیشتاز</p>
                <p>توضیحات</p>
            </td>
            <td width="150px" style="border-right: 1px solid #e9e9e9">
                    <span>
                        هزینه ارسال
                    </span>
                <span>
                        10,000
                        هزار تومان
                    </span>
            </td>
        </tr>
    </table>

    <script>

        $('#send_type .select_but').click(function () {
            $(this).toggleClass('activeAddress');
            /*$('#send_type .select_but').removeClass('activeAddress');
            $(this).addClass('activeAddress');*/
        });
    </script>

</div>