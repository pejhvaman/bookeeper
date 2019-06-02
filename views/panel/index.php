<style>
    .addBtn {
        display: block;
        border-radius: 8px;
        /*width: 150px;
        height: 42px;*/
        background: #67bfb0;
        text-align: center;
        color: white;
        border: 1px solid #4d8f84;
        font-size: 12.5pt;
        cursor: pointer;
        transition: background-color 300ms ease-in;
    }

    .addBtn:hover {
        background-color: #4d8f84;
    }

    .data_title {
        width: 99%;
        color: #6f6f6f;
        font-size: 16pt;
        margin-right: 15px;
    }

    .data_box {
        width: 100%;
        margin: auto;
        background: white;
        border: 1px solid #e9e9e9;
        font-family: sans;
        float: right;
    }

    .data_box table {
        width: 100%;
        float: right;
    }

    .data_box table tr {
        width: 100%;
        height: 60px;
    }

    .data_box table tr td {
        width: 30%;
        height: 100%;
        padding-right: 5px;
        border-left: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
    }

    .data_box table tr td:last-child {
        border-left: unset;
    }

    .data_box table tr:last-child td {
        border-bottom: unset;
    }

    .title_data {
        color: #67bfb0;
    }

    .value_data {
        color: #6f6f6f;
        margin-right: 8px;
    }

    .data_box1 {
        width: 100%;
        float: right;
        margin-bottom: 20px;
    }
</style>

    <?php
    require ('user_information.php');
    require ('function_report.php');
    require ('tabs.php');
    ?>


