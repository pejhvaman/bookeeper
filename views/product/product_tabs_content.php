<style>
    #tab_content {
        width: 95%;
        float: right;
        background: white;
        padding: 30px;
    }
    #tab_content section {
        display: none;
        font-family: sans;
    }
</style>
<div id="tab_content">
    <section id="property"></section>
    <section id="nazar"></section>
    <section id="question_ask"></section>
    <?php
    $bookInfo = $data['bookInfo'];
    /*require ('property_tab.php');
    require ('comments_tab.php');
    require ('questions_tab.php');*/
    ?>
</div>
<script>

    $('#tab_part li').click(function () {
        changeTab($(this));
    });

    function changeTab(tag) {
        $('#tab_part li').removeClass('activeTab');
        tag.addClass('activeTab');
        $('#tabs section').fadeOut(100);
        var tabNum = tag.index();
        var sectionSelected = $('#tabs section').eq(tabNum);

        var url = '<?= URL ?>product/tab/<?= $bookInfo['id']; ?>';
        var data = {'tabNum':tabNum};
        $.post(url, data, function (msg) {
            sectionSelected.html(msg);
        });
        sectionSelected.fadeIn(100);
    }

    $('.<?= $data['activeTab'] ?>').trigger('click');

</script>