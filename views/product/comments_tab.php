<style>
    #nazar {
        width: 100%;
        float: right;
    }

    #add_comment {
        width: 100%;
        float: right;
        height: 290px;
        border-bottom: 1px solid #e9e9e9;

    }

    .all_comments {
        width: 1234px;
        float: right;
    }

    .comments {
        width: 100%;
        float: right;
        margin: 20px auto;
        border: 1px solid #f5f5f5;
        background: #fafafa;
        border-radius: 8px;
    }

    #add_comment h4 {
        color: #6f6f6f;
        font-weight: normal;
        font-size: 16pt;
        line-height: 75px;
    }

    .commenter {
        width: 95%;
        height: 70px;
        margin: auto;
        border-bottom: 1px solid #e9e9e9;
    }

    .by_who_when {
        color: #b6b6b6;
        line-height: 70px;
        font-size: 13.5pt;
    }

    .likeOrNot {
        width: 350px;
        height: 100%;
        float: left;
    }

    .like, .dislike {
        display: block;
        width: 70px;
        height: 36px;
        border-radius: 5px;
        border: 1px solid #e9e9e9;
        background: white;
        float: left;
        margin-right: 10px;
        margin-top: 17px;
    }

    .dislike_icon, .like_icon {
        display: block;
        width: 32px;
        height: 32px;
        float: right;
        margin-right: 2px;
        margin-top: 2px;
        cursor: pointer;
    }

    .dislike_icon {
        background: url(public/images/dislikeblack.png) no-repeat center;
    }

    .like_icon {
        background: url(public/images/likeblack.png) no-repeat center;
    }

    .dislike_count, .like_count {
        display: block;
        width: 34px;
        text-align: center;
        float: left;
        color: #6f6f6f;
        line-height: 36px;

    }

    .do_you_likeOrNot {
        color: #6f6f6f;
        float: right;
        margin-top: 24px;
    }

    .comment_text {
        width: 92%;
        padding: 20px;
        margin: auto;
        color: #6f6f6f;
    }
    .likedThis{
        background: url(public/images/likered.png) no-repeat center;
    }
    .dislikedThis{
        background: url(public/images/dislikered.png) no-repeat center;
    }
</style>
<div id="add_comment">
        <textarea style="width: 100%;border-radius: 10px;border: 1px solid #ccc;resize: none" placeholder="اگر نظری دارید ،در این قسمت بنویسید..." rows="12">

        </textarea>

    </textarea>
    <span class="addBtn" style="margin-top: 5px">
          نظر خود را ثبت کنید
    </span>

    <h4>
        نظرات کاربران
    </h4>
</div>
<?php
$comments = $data;
?>
<div class="all_comments">
    <?php
    foreach ($comments as $comment) {
        ?>
        <div id="comment<?= $comment['id'] ?>" class="comments">
            <div class="commenter">
                        <span class="by_who_when">
                            توسط
<?= $comment['nam']; ?>
                            در تاریخ
                            <?= $comment['sabt_time'] ?>
                        </span>
                <div class="likeOrNot">
                            <span class="dislike">
                                <span data-dislikeCount="<?= $comment['dislike_count'] ?>" data-idbook="<?= $comment['product_id'] ?>" class="dislike_icon"></span>
                                <span class="dislike_count">
                                    <?php
                                    echo $comment['dislike_count']
                                    ?>
                                </span>
                            </span>
                    <span class="like">
                                <span data-likeCount="<?= $comment['like_count'] ?>" data-idbook="<?= $comment['product_id'] ?>" class="like_icon"></span>
                                <span class="like_count">
                                    <?php
                                    echo $comment['like_count']
                                    ?>
                                </span>
                            </span>
                    <span class="do_you_likeOrNot">
                                آیا این نظر برایتان مفید بود؟
                    </span>
                </div>
            </div>
            <div class="comment_text">
                <p>
                    <?php
                    echo $comment['matn'];
                    ?>
                </p>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<script>
    $('.like_icon').click(function () {
            if($('.dislike_icon').hasClass('dislikedThis')){

            }else{
                $(this).toggleClass('likedThis');
                var idbook = $(this).attr('data-idbook');
                var likeCount = $(this).attr('data-likeCount');
                if($(this).hasClass('likedThis')){
                    $hasClas = 1;
                    $(this).attr('data-likeCount',parseInt(likeCount)+1);
                    $(this).next().html(parseInt(likeCount)+1);
                }else{
                    $hasClas = 0;
                    $(this).attr('data-likeCount',parseInt(likeCount)-1);
                    $(this).next().html(parseInt(likeCount)-1);
                }
                var url = "<?= URL ?>product/updateLikeCount";
                var data = {'hasClass':$hasClas, 'idbook':idbook,'likeCount':likeCount};
                $.post(url, data, function (msg) {
                    console.log(msg);
                });
            }

    });


    $('.dislike_icon').click(function () {
        if($('.like_icon').hasClass('likedThis')){

        }else{
            $(this).toggleClass('dislikedThis');
            var idbook = $(this).attr('data-idbook');
            var dislikeCount = $(this).attr('data-dislikeCount');
            if($(this).hasClass('dislikedThis')){
                $hasClas = 1;
                $(this).attr('data-dislikeCount',parseInt(dislikeCount)+1);
                $(this).next().html(parseInt(dislikeCount)+1);
            }else{
                $hasClas = 0;
                $(this).attr('data-dislikeCount',parseInt(dislikeCount)-1);
                $(this).next().html(parseInt(dislikeCount)-1);
            }
            var url = "<?= URL ?>product/updateDisLikeCount";
            var data = {'hasClass':$hasClas, 'idbook':idbook,'dislikeCount':dislikeCount};
            $.post(url, data, function (msg) {
                console.log(msg);
            });
        }
    });
</script>