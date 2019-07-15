<style>
    #tab_part {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #tab_part ul {
        width: 100%;
        height: 50px;
        float: right;
        background: #f9f9f9;
        border: 1px solid #dcdcdc;
        border-right: unset;
        padding-right: 0;
    }

    #tab_part ul li {
        float: right;
        width: 150px;
        height: 100%;
        color: #6f6f6f;
        text-align: center;
        line-height: 50px;
        font-size: 13pt;
        border-left: 1px solid #dcdcdc;
        cursor: pointer;
    }

    #tab_part ul li.activeTab {
        box-shadow: 0 -4px 1px #67bfb0;
        background: white;
        height: 101% !important;
    }
</style>
<div id="tab_part">
    <ul>
        <li>
            پیغام های من
        </li>
        <li>
            سفارشات من
        </li>
        <li>
            لیست مورد علاقه
        </li>
        <li>
            نظرات من
        </li>
        <li>
            کدهای تخفیف
        </li>
    </ul>
</div>
<script>

    $('#tab_part li').click(function () {
        $('#tab_part li').removeClass('activeTab');
        $(this).addClass('activeTab');
        $('#tabs section').fadeOut(0);
        var tabNum = $(this).index();
        $('#tabs section').eq(tabNum).fadeIn(200);
    });

</script>