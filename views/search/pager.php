
<style>
    #pager {
        width: 100%;
        float: right;
        padding: 20px 0;
    }

    #next_page {
        display: block;
        float: left;
        width: 24px;
        height: 24px;
        background: url(public/images/nextpage.png) no-repeat center;
        margin: 0 10px 0 20px;
        cursor: pointer;
    }

    #pager ul {
        padding: 0;
        float: left;
    }

    #pager ul li {
        float: right;
        width: 24px;
        height: 24px;
        text-align: center;
        cursor: pointer;
        border-radius: 8px;
        color: #6f6f6f;
        font-size: 14pt;
        line-height: 27px;
        margin: 0 8px;
    }

    #pager ul li.activePage {
        box-shadow: 0 0 25px #a8a8a8;
    }

    #prev_page {
        display: block;
        float: left;
        width: 24px;
        height: 24px;
        background: url(public/images/prevpage.png) no-repeat center;
        margin: 0 10px 0 20px;
        cursor: pointer;
    }
</style>
<div id="pager">
    <span id="next_page"></span>
    <ul>
        <li class="activePage">
            1
        </li>
        <li>
            2
        </li>
    </ul>
    <span id="prev_page"></span>
</div>