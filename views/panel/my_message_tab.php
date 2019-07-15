<style>
    #my_message {
        width: 100%;
        float: right;
        font-family: sans;
    }

    #my_message table {
        width: 100%;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    #my_message table tr {
        height: 45px;
    }

    #my_message table tr td {
        width: 18%;
        text-align: center;
        border-left: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
    }

    #my_message table tr td:last-child {
        border-left: unset;
    }

    #my_message table tr:last-child td {
        border-bottom: unset;
    }

    #my_message table tr:first-child {
        background: #fbfbfb;
    }
    .message_text {
        height: 100px;
        width: 100%;
        overflow-y: scroll;
    }
</style>
<?php
$messages = $data['messages'];
?>

<section id="my_message">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                عنوان
            </td>
            <td>
                متن
            </td>
            <td>
                وضعیت
            </td>
        </tr>
        <?php
        foreach ($messages as $key => $message) {
            ?>
            <tr>
                <td>
                    <?= $key + 1 ?>
                </td>
                <td>
                    <?= $message['title'] ?>
                </td>
                <td>
                    <p class="message_text">
                        <?= $message['matn'] ?>
                    </p>
                </td>
                <td>
                    <?php
                    if($message['status'] == 0){
                        echo 'خوانده نشده';
                    }
                    elseif ($message['status'] == 1){
                        echo 'خوانده شده';
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</section>