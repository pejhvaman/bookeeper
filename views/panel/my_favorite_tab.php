<style>
    #my_favorite {
        width: 100%;
        float: right;
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
    }

    #fav_list li > span {
        display: block;
        color: #6f6f6f;
        margin-right: 10px;
    }
</style>
<section id="my_favorite">

    <ul id="fav_list">
        <li>
            <div class="delete_fav">
                <span class="delete_icon"></span>
            </div>
            <img src="public/images/taun1.jpg">
            <span>
                                بیگانه
                            </span>
            <span>
                                آلبر کامو
                            </span>
            <span>
                                انتشارات نیلوفر
                            </span>
        </li>
    </ul>
</section>