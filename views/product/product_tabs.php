<style>
    #tabs {
        width: 100%;
        float: right;
        margin-top: 20px;
        background: white;
        box-shadow: 2px 2px 5px #cbcbcb;
    }

    .addBtn {
        display: block;
        border-radius: 8px;
        width: 150px;
        height: 42px;
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        line-height: 42px;
        font-size: 12.5pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
        float: left;
    }

    .addBtn:hover {
        background-color: #4d8f84;
    }
</style>
<div id="tabs">
    <?php
    require ('product_tabs_part.php');
    require ('product_tabs_content.php');
    ?>
</div>
