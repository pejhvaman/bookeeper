<style>
    #my_opinion {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #my_opinion table {
        width: 100%;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    #my_opinion table tr {
        height: 45px;
    }

    #my_opinion table tr td {

        text-align: center;
        border-left: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
    }

    #my_opinion table tr td span {
        margin: auto;
    }

    #my_opinion table tr td:last-child {
        border-left: unset;
    }

    #my_opinion table tr:last-child td {
        border-bottom: unset;
    }

    #my_opinion table tr:first-child {
        background: #fbfbfb;
    }

    .view_opi {
        display: block;
        width: 24px;
        height: 24px;
        margin: auto;
        background: url(public/images/eye.png) no-repeat center;
    }

    .edit_opi {

        display: block;
        width: 24px;
        height: 24px;
        margin: auto;
        background: url(public/images/edit.png) no-repeat center;
    }

    .delete_opi {

        display: block;
        width: 24px;
        height: 24px;
        margin: auto;
        background: url(public/images/x-button.png) no-repeat center;
        cursor: pointer;
    }
</style>
<section id="my_opinion">

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                ردیف
            </td>

            <td>
                تاریخ
            </td>
            <td>
                کتاب
            </td>
            <td>
                پسندیدن
            </td>
            <td>
                مشاهده
            </td>

            <td>
                ویرایش
            </td>
            <td>
                حذف
            </td>
        </tr>
        <?php
        $comments = $data['comments'];
        $i = 1;
        foreach ($comments as $comment) {
            ?>
            <tr class="comments_tr">
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $comment['sabt_time'] ?>
                </td>
                <td>
                    <span><?= $comment['esm'] ?></span>
                    <span><?= $comment['nevisande'] ?></span>
                </td>
                <td>
                    <?php
                    $like_or_dislike = $comment['like_or_dislike'];
                    if ($like_or_dislike == 0) {
                        echo 'نپسندیدم';
                    } elseif ($like_or_dislike == 1) {
                        echo 'پسندیدم';
                    }
                    ?>
                </td>
                <td>
                    <a href="product/index/<?= $comment['product_id'] ?>/nazar#comment<?= $comment['id'] ?>" class="view_opi"></a>
                </td>
                <td>
                    <a href="addcomment/index/<?= $comment['product_id'] ?>" class="edit_opi"></a>
                </td>
                <td>
                    <a onclick="deleteComment(<?= $comment['id'] ?>)" class="delete_opi"></a>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
</section>
<script>
    function deleteComment(id) {
        var comment_id = id;
        var url = 'panel/deletecomment';
        var data = {'comment_id': comment_id};
        $.post(url, data, function (msg) {
            console.log(msg);
            var i = 1;

            $.each(msg, function (index, value) {
                var likeOrDislike = '';
                if (value['sabt_time'] == 0) {
                    likeOrDislike = 'نپسندیدم';
                } else {
                    likeOrDislike = 'پسندیدم';
                }
                var trTag = '<tr class="comments_tr"><td>' + i + '</td><td>' + value['sabt_time'] + '</td><td><span>' + value['esm'] + '</span> <span>' + value['nevisande'] + '</span></td><td>' + likeOrDislike + '</td><td><a href="" class="view_opi"></a></td><td><a href="addcomment/index/' + value['product_id'] + '" class="edit_opi"></a></td><td><a onclick="deleteComment(' + value['id'] + ')" class="delete_opi"></a></td></tr>';
                var commentsTable = $('#my_opinion table');
                var commentsTr = $('.comments_tr');
                commentsTr.remove();
                commentsTable.append(trTag);
            });
        }, 'json');
    }
</script>