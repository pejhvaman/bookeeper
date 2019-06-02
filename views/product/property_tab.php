<style>
    #property {
        width: 100%;
        float: right;
    }

    #border_stretch {
        width: 100%;
        float: left;
    }

    #border_stretch ul {
        width: 100%;
        float: right;
        border-right: 2px solid #6f6f6f;
        padding: 0;
    }

    #border_stretch ul li {
        width: 100%;
        float: right;
        color: #6f6f6f;
        font-size: 12pt;
        margin: 25px 0;
    }

    #border_stretch ul li:first-child {
        margin-top: unset !important;
    }

    #border_stretch ul li:last-child {
        margin-bottom: unset !important;
    }

    #border_stretch i {
        display: block;
        width: 32px;
        height: 32px;
        float: right;
        position: relative;
        right: -17px;
        background: white url(public/images/addition-button.png) no-repeat center;
        cursor: pointer;
    }

    .description {
        width: 98%;
        float: right;
        font-size: 10.5pt;
        padding: 15px;
        margin-top: 40px;
        display: none;
    }

    .less {
        background: white url(public/images/minus-sign-in-filled-circle.png) no-repeat center !important;
    }

</style>
<?php
$properties = $data;
?>
    <div id="border_stretch">
        <ul>
            <?php
            foreach ($properties as $property) {
                ?>
                <li>
                    <i></i>
                    <?php
                    echo $property['title']
                    ?>
                    <div class="description">
                        <?php
                        echo $property['tozihat']
                        ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>

<script>
    $('#tab_content i').click(function () {
        $(this).next().slideToggle();
        $(this).toggleClass('less');
    });
</script>