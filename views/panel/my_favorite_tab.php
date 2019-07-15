<style>
    #my_favorite {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #fav_list {
        float: right;
        width: 100%;
        padding: 0;
    }

    #fav_list li {
        float: right;
        width: 200px;
        height: 395px;
        /*border: 1px solid #e9e9e9;*/
        border-radius: 5px;
        text-align: center;
        margin-bottom: 10px;
        /* box-shadow: 0 0 25px #a8a8a8;*/
    }

    #fav_list li:hover {
        box-shadow: 0 0 25px #a8a8a8;
    }

    #fav_list .delete_fav {
        width: 100%;
        height: 25px;
        float: right;
    }

    .delete_icon {
        display: block;
        width: 24px;
        height: 24px;
        float: left;
        background: url(public/images/x-button.png) no-repeat center;
        margin: 1px 0 0 1px;
        cursor: pointer;
    }

    #fav_list img {
        max-width: 180px;
        border-radius: 5px;
        margin-top: 15px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    #fav_list li > span {
        display: block;
        color: #6f6f6f;
        margin-right: 10px;
    }
</style>
<?php
$favorites = $data['favorites'];
?>
<section id="my_favorite">

    <ul id="fav_list">
        <?php
        if(sizeof($favorites) != 0) {
            foreach ($favorites as $favorite) {
                ?>
                <li>
                    <div class="delete_fav">
                        <span class="delete_icon" onclick="deleteFav(<?= $favorite['id'] ?>)"></span>
                    </div>
                    <img src="public/images/books/<?= $favorite['id'] ?>/book_250.jpg">
                    <span>
                                <?= $favorite['esm'] ?>
                            </span>
                    <span>
                                <?= $favorite['nevisande'] ?>
                            </span>
                    <span>
                               <?= $favorite['entesharat'] ?>
                            </span>
                </li>
                <?php
            }
        }
        else{
            echo 'هنوز محصولی را نپسنده اید!';
        }
        ?>

    </ul>
</section>
<script>
    function deleteFav(id) {
        var url = 'panel/delete_favorite';
        var data = {'id': id};
        $.post(url, data ,function (msg) {
            console.log(msg);
            if (msg.length != 0){
                $.each(msg, function (index, value) {
                    liTag = '<li><div class="delete_fav"><span class="delete_icon" onclick="deleteFav('+value['id']+')"></span></div><img src="public/images/books/'+value['id']+'/book_250.jpg"><span>'+value['esm']+'</span><span>'+value['nevisande']+'</span><span>'+value['entesharat']+'</span></li>';
                    var fav_list = $('#fav_list');
                    fav_list.empty();
                    fav_list.append(liTag);
                });
            } else{
                var fav_list = $('#fav_list');
                fav_list.text('هنوز محصولی را نپسنده اید!');
            }

        }, 'json');

    }
</script>