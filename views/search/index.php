<form id="search_form" action="search/dosearch" method="post">
    <?php
    require('content_right.php');
    require('content_left.php');
    ?>
</form>
<script>
    $('#existBtn').click(function () {
        var btn = $(this).find('#noExist');
        if (btn.hasClass('yesExist')) {
            btn.removeClass('yesExist');
        } else {
            btn.addClass('yesExist');
        }
        doSearch();
    });
    $('#row_mode').click(function () {
        $(this).parents('#show_mode').find('#table_mode').addClass('deactiveTable');
        $(this).addClass('activeRow');
        $('#search_res li').addClass('liRowMode');
    });
    $('#table_mode').click(function () {
        $(this).parents('#show_mode').find('#row_mode').removeClass('activeRow');
        $(this).removeClass('deactiveTable');
        $('#search_res li').removeClass('liRowMode');
    });

    $('#search_word_icon').click(function () {
        doSearch();
    });

    $('#sort_by select').change(function () {
        doSearch();
    });

    ///

    var currentPage = 1;

    function doSearch(page) {
        if (typeof (page) != 'undefined') {
            currentPage = page;
        } else {
            currentPage = 1;
        }
        if (currentPage < 1) {
            currentPage = 1;
        }
        var lastPageNum = $('#pager ul li:last').text();
        if (currentPage > lastPageNum) {
            currentPage = lastPageNum;
        }
        var data = $('#search_form').serializeArray();
        var exist = 0;
        if ($('#noExist').hasClass('yesExist') == true) {
            exist = 1;
        }
        //var keyWord = $('#search_word').val();
        //alert(keyWord);
        var url = "search/doSearch";
        var idCategory = $('#by_cat').attr('data-catId');
        data.push({'name': 'idCategory', 'value': idCategory});
        data.push({'name': 'exist', 'value': exist});

        /*var currentPage = $('#pager ul li.activePage').text();
        if (currentPage == '') {
            currentPage = 1;
        }*/
        data.push({'name': 'currentPage', 'value': currentPage});//worked

        var limit = $('#limit option:selected').val();//worked
        data.push({'name': 'limit', 'value': limit});
        //alert(currentPage);
        //data.push({'name':'keyWord','value':keyWord});
        //var data = {'exist': exist, 'keyWord': keyWord};

        $.post(url, data, function (msg) {
            $('#search_res ul').html('');
            $.each(msg[0], function (index, value) {
                //console.log(msg);
                var liTag = '<li><a><img src="public/images/books/' + value['id'] + '/book_250.jpg"><p class="bookname">' + value['esm'] + '</p><p class="writername">' + value['nevisande'] + '</p><p class="nasher_num">' + value['entName'] + '</p><p class="price">' + value['gheymat'] + '</p><p class="tozih">' + value['moarefi'] + '</p></a></li>';
                $('#search_res ul').append(liTag);
            });

            var page_num = msg[1];
            var i;
            var activePage = "";
            $('#pager ul').html("");
            var start = currentPage - 1;
            if (start < 1) {
                start = 1;
            }
            var end = currentPage + 1;
            if (end > page_num) {
                end = page_num;
            }
            for (i = start; i <= end; i++) {
                if (i == currentPage) {
                    activePage = "activePage";
                } else {
                    activePage = "";
                }
                $('#pager ul').append('<li onclick="pager(this, ' + i + ')" class="' + activePage + '">' + i + '</li>');
            }

            //alert(page_num);
            //console.log(page_num);

        }, 'json');
    }

    doSearch();
</script>

