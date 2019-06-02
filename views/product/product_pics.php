<style>
    #pics {
        width: 570px;
        float: right;
        border-left: 1px solid #e9e9e9;
        background: white;
    }

    #lovenshare {
        width: 100%;
        float: right;
    }

    #love {
        display: block;
        float: left;
        margin: 20px;
        width: 32px;
        height: 32px;
        background: url(public/images/nolove.png) no-repeat center;
        cursor: pointer;
    }

    #share {
        display: block;
        float: left;
        margin: 20px;
        width: 32px;
        height: 32px;
        background: url(public/images/share.png) no-repeat center;
        cursor: pointer;
    }

    #big_pic {
        width: 100%;
        height: 578px;
        float: right;
        text-align: center;
    }

    #big_pic img {
        margin: 80px auto;
        max-width: 250px;
        max-height: 375px;
        border-radius: 4px;
    }

    #entesharat {
        width: 100%;
        float: right;
        text-align: center;
        margin: 30px 0;
    }

    #entesharat ul {
        width: 100%;
        float: right;
        text-align: center;
    }

    #entesharat ul li {
        float: right;
        width: 120px;
        height: 170px;
        border: 1px solid #e9e9e9;
        border-radius: 10px;
        margin: 10px;
        cursor: pointer;
        text-align: center;
    }

    #entesharat img {
        margin-top: 10px;
        max-width: 100px;
        max-height: 150px;
        border-radius: 4px;
    }


    #entesharat p {
        font-size: 13pt;
        color: #6f6f6f;
        margin: 0 10px;
    }

    .activeEnteshar {
        border: 1px solid #e54a86 !important;
    }

    .loved {
        background: url(public/images/love.png) no-repeat center !important;
    }

    #pics * {
        font-family: sans;
    }
</style>
<?php
$bookInfo = $data['bookInfo'];
?>

<div id="pics">
    <div id="lovenshare">
        <span id="love"></span>
        <span id="share"></span>
    </div>
    <script>
        $('#love').click(function () {
            if ($(this).hasClass('loved')) {
                var liked = 1;
                var url = '<?= URL ?>product/like/<?= $bookInfo['id']?>';
                var data ={'liked':liked};
                $.post(url, data, function (msg) {
                    console.log(msg);
                });
            } else {
                var url = '<?= URL ?>product/like/<?= $bookInfo['id']?>';
                var data ={'liked':2};
                $.post(url, data, function (msg) {
                    console.log(msg);
                });
            }
        });
    </script>

    <div data-ent="" id="big_pic">
        <img src="public/images/books/<?= $bookInfo['id'] ?>/book_250.jpg">
    </div>
    <!--<div id="entesharat">
        <p>
            ناشر های این کتاب :
        </p>
        <ul>
            <?php
/*            $bookInfo = $data['bookInfo'];
            $entesharats = $bookInfo['entesharats'];
            foreach ($entesharats as $entesharat) {
                */?>
                <li title="<?/*= $entesharat['nam'] */?>" data-pic="<?/*= $entesharat['id'] */?>">
                    <img src="public/images/books/<?/*= $bookInfo['id'] */?>/book_100.jpg">
                </li>
                <?php
/*            }
            */?>
        </ul>
    </div>-->
</div>

<script>
    $('#love').click(function () {
        if ($(this).hasClass('loved')) {
            $(this).removeClass('loved');
        } else {
            $(this).addClass('loved');
        }

    });

    function showMainPic() {
        var liTag = $('#entesharat li');
        var firstLi = liTag.eq(0);
        firstLi.addClass('activeEnteshar');
        var entId = firstLi.attr('data-pic');
        var mainPicAddress = 'public/images/books/<?= $bookInfo['id'] ?>/entesharat/' + entId + '/book_250.jpg';
        $('#big_pic img').attr('src', mainPicAddress);
    }

    //showMainPic();


    $('#entesharat ul li').click(function () {
        $('#entesharat li').removeClass('activeEnteshar');
        $(this).addClass('activeEnteshar');
        var entId = $(this).attr('data-pic');
        var picUrl = 'public/images/books/<?= $bookInfo['id'] ?>/entesharat/' + entId + '/book_250.jpg'; //badan id ketab az tbl_books gerefte mishavad
        $('#big_pic img').attr('src', picUrl);
    });
</script>