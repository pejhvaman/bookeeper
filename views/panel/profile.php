<style>
    #container {
        float: right;
        width: 95%;
        background: white;
        border-radius: 4px;
        box-shadow: 3px 3px 3px #cecece;
        padding: 30px;
        font-family: sans;
        color: #3f3f3f;
        margin: 0 auto;
    }

    .row, .row1 {
        width: 100%;
        padding: 8px;
        float: right;
    }

    .row label {
        display: block;
        width: 140px;
        text-align: right;
        margin-left: 4px;
    }

    .row input {
        width: 250px;
        border: 1px solid #9a9a9a;
        border-radius: 6px;
        padding: 4px;
        font-family: sans;
        color: #3f3f3f;
    }

    .row1 label {
        display: inline-block;
        width: 80px;
        text-align: left;
        margin-right: 24px;
    }

    .row1 span, .row span {
        display: inline-block;
    }

    .row textarea {
        border-radius: 8px;
        width: 60%;
        height: 150px;
        border: 1px solid #9a9a9a;
        resize: none;
        padding: 6px;
        font-family: sans;
        color: #3f3f3f;
    }

    .row1 select {
        width: 60px;
        border: 1px solid #9a9a9a;
        border-radius: 4px;
        color: #3f3f3f;
    }

    .btn-pejhva-primary {
        display: block;
        width: 100px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        float: left;
        padding: 0 10px;
        background: #00b189;
        border-radius: 4px;
        font-family: sans;
        font-size: 14pt;
        color: whitesmoke;
        cursor: pointer;
        transition: 500ms;
        margin-left: 50px;
    }

    .btn-pejhva-primary:hover {
        opacity: 0.7;
    }

    .btn-pejhva-secondary {
        display: block;
        width: 98px;
        height: 38px;
        line-height: 40px;
        text-align: center;
        float: left;
        padding: 0 10px;
        background: white;
        border: 1px solid #9a9a9a;
        border-radius: 4px;
        font-family: sans;
        font-size: 14pt;
        color: #3f3f3f;
        cursor: pointer;
        transition: 500ms;
        margin-left: 50px;
    }

    .btn-pejhva-secondary:hover {
        opacity: 0.7;
    }
</style>
<?php
$user_info = $data['user_info'];
?>

<form id="profile_form" action="panel/editprofile" method="post">
    <div id="container">
        <div class="row">
            <h2>
                اطلاعات کاربری
            </h2>
        </div>
        <div class="row">
            <label for="name">نام و نام خانوادگی</label>
            <input type="text" name="name" value="<?= $user_info['nam'] ?>">
        </div>
        <div class="row">
            <label for="email">ایمیل</label>
            <input type="text" name="email" value="<?= $user_info['email'] ?>">
        </div>
        <div class="row">
            <label for="melli_kod">کد ملی</label>
            <input type="text" name="melli_kod" value="<?= $user_info['code_melli'] ?>">
        </div>
        <div class="row">
            <label for="tel">تلفن ثابت</label>
            <input type="text" name="tel" value="<?= $user_info['tel'] ?>">
        </div>
        <div class="row">
            <label for="mobile">شماره موبایل</label>
            <input type="text" name="mobile" value="<?= $user_info['mobile'] ?>">
        </div>
        <div class="row1">
            <span>تاریخ تولد: </span>
            <label for="birth_day">روز تولد</label>
            <select name="birth_day" id="">
                <?php
                $birth_date = $user_info['tavalod'];
                $birth_date_arr = explode('/', $birth_date);
                //print_r($birth_date_arr);
                $year = $birth_date_arr[0];
                $month = $birth_date_arr[1];
                $day = $birth_date_arr[2];
                for ($i = 1; $i <= 31; $i++) {
                    ?>
                    <option value="<?= $i ?>" <?php if ($i == $day) {
                        echo 'selected';
                    } ?>>
                        <?= $i ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <label for="birth_month">ماه تولد</label>
            <select name="birth_month" id="">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    ?>
                    <option value="<?= $i ?>" <?php if ($i == $month) {
                        echo 'selected';
                    } ?>>
                        <?= $i ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <label for="birth_year">سال تولد</label>
            <select name="birth_year" id="">
                <?php
                $this_year = Model::jalaliDate('Y');
                for ($i = $this_year - 60; $i <= $this_year; $i++) {
                    ?>
                    <option value="<?= $i ?>" <?php if ($i == $year) {
                        echo 'selected';
                    } ?>>
                        <?= $i ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <label for="address">آدرس</label>
            <textarea name="address" id="" cols="30" rows="10">
            <?= $user_info['address'] ?>
        </textarea>
        </div>
        <div class="row1">
            <span>جنسیت</span>
            <label for="men">مرد</label>
            <input name="jens" type="radio" value="1" <?php if($user_info['jens']==1){echo 'checked';} ?>>
            <label for="women">زن</label>
            <input name="jens" type="radio" value="2" <?php if($user_info['jens']==2){echo 'checked';} ?>>
        </div>
        <div class="row">
            <a href="panel" class="btn-pejhva-secondary">
                بازگشت
            </a>
            <span onclick="submitProfile()" class="btn-pejhva-primary">
                ثبت
            </span>
        </div>
    </div>
</form>
<script>
    function submitProfile() {
        $('#profile_form').submit();
    }
</script>
