<style>

    #tab_part {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #tab_part ul {
        padding-right: 0;
        width: 100%;
        height: 50px;
        float: right;
        background: #f9f9f9;
        border: 1px solid #dcdcdc;
        border-right: unset;
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
        <li class="property">
            مشخصات
        </li>
        <li class="nazar">
            نظرات کاربران
        </li>
        <li class="soal">
            پرسش و پاسخ
        </li>
    </ul>
</div>
