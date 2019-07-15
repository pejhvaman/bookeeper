<?php
$user_info = $data['user_info'];
//print_r($user_info);
?>
<div class="data_box1">
    <div class="data_title">
        اطلاعات کاربری
    </div>
    <div class="data_box">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                        <span class="title_data">
                            نام و نام خانوادگی:
                        </span>
                    <span class="value_data">
                            <?= $user_info['nam'] ?>
                        </span>
                </td>
                <td>
                        <span class="title_data">
ایمیل:
                        </span>
                    <span class="value_data">
                   <?= $user_info['email'] ?>
                    </span>
                </td>
                <td>
                        <span class="title_data">
کد ملی:
                        </span>
                    <span class="value_data">
<?= $user_info['code_melli'] ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                        <span class="title_data">
شماره تلفن ثابت:
                        </span>
                    <span class="value_data">
<?= $user_info['tel'] ?>
                    </span>
                </td>
                <td>
                        <span class="title_data">
شماره تلفن  همراه:
                        </span>
                    <span class="value_data">
<?= $user_info['mobile'] ?>
                    </span>
                </td>
                <td>
                        <span class="title_data">
تاریخ تولد:
                        </span>
                    <span class="value_data">
<?= $user_info['tavalod'] ?>
                    </span>
                </td>
            <tr>
                <td colspan="3">
                        <span class="title_data">
آدرس :
                        </span>
                    <span class="value_data">
<?= $user_info['address'] ?>
                    </span>
                </td>
            </tr>
            </tr>
            <tr>
                <td colspan="3" style="height: 70px">
                        <span class="addBtn"
                              style="width: 110px;height: 36px;line-height: 36px;margin: auto;font-size: 11.5pt">
                            ویرایش اطلاعات
                        </span>
                </td>
            </tr>
        </table>

    </div>
</div>