<style>
    #tab_content {
        width: 95.4%;
        float: right;
        background: white;
        padding: 30px;
    }

    #tab_content section {
        display: none;
    }
</style>
<div id="tab_content">
    <?php
    require ('my_message_tab.php');
    require ('my_order_tab.php');
    require ('my_favorite_tab.php');
    require ('my_opinion_tab.php');
    require ('off_code_tab.php');
    ?>
</div>

<script>

    $('.more_detail').click(function () {
        $(this).toggleClass('close_detail');
        var parent = $(this).parents('tr');
        var moreDetail = parent.next();
        moreDetail.slideToggle(100);
    });
</script>