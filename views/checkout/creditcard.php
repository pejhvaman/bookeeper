<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<style>
    .container * {
        font-family: sans;
    }

    .container {
        background: white;
        float: right;
        padding: 100px;
    }
    .row{
        float: right;
        margin-right: 15px;
        margin-top: 20px;
    }

</style>
<?php
$order_info = $data['order_info'];
?>
<div class="container col-lg-12">
    <form action="checkout/creditcard/<?= $order_info['id'] ?>" method="post">
        <div class="form-group">
            <div class="row col-lg-12">
                <h3>
                    تاریخ واریز :
                </h3>
            </div>
            <div class="row col-lg-2">
                <label for="day">روز : </label>
                <div class="input-group mb-3">
                    <select name="day" class="custom-select">
                        <option selected>انتخاب کنید</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {

                            ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-lg-2">
                <label for="month">ماه : </label>
                <div class="input-group mb-3">
                    <select name="month" class="custom-select">
                        <option selected>انتخاب کنید</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {

                            ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-lg-2">
                <label for="year">سال : </label>
                <div class="input-group mb-3">
                    <select name="year" class="custom-select">
                        <option value="<?php $emsal=1398; echo $emsal; ?>" selected>
                            <?php echo "1398"; ?>
                        </option>
                        <option value="<?php echo $emsal-1; ?>">
                            <?php echo $emsal-1; ?>
                        </option>
                    </select>
                </div>
            </div>
            <div class="row col-lg-2">
                <label for="hour">ساعت : </label>
                <div class="input-group mb-3">
                    <select name="hour" class="custom-select">
                        <option selected>انتخاب کنید</option>
                        <?php
                        for ($i = 0; $i <= 23; $i++) {

                            ?>
                            <option value="<?= $i ?>">
                                <?php
                                if($i==0){
                                    echo "00";
                                }else{
                                    echo $i;
                                }
                                ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-lg-2">
                <label for="minute">دقیقه : </label>
                <div class="input-group mb-3">
                    <select name="minute" class="custom-select">
                        <option selected>انتخاب کنید</option>
                        <?php
                        for ($i = 0; $i <= 59; $i++) {

                            ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-lg-8">
                <h3>
                    اطلاعات کارت :
                </h3>
            </div>
            <div class="row col-lg-7">
                <label for="card_num">شماره کارت : </label>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="card_num">
                </div>
            </div>
            <div class="row col-lg-7">
                <label for="bank_name">نام بانک : </label>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="bank_name">
                </div>
            </div>
            <div class="row col-lg-8">
                <input class="btn btn-primary" type="submit" value="ثبت اطلاعات">
                <a href="checkout/index/<?= $order_info['id'] ?>" class="btn btn-success" style="margin-right: 15px;color: white;cursor: pointer">
                    بازگشت
                </a>
            </div>
    </form>
</div>
</div>