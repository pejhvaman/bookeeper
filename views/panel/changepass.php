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

    .row {
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
   #error {
       color: #f35048;
       font-size: 16pt;
   }

    #success {
        color: #00afcf;
        font-size: 16pt;
    }
</style>


<form id="pass_form" action="panel/changepass" method="post">
    <div id="container">
        <?php
        if(isset($_GET['status'])){
            if ($_GET['status'] != ''){
                ?>
                <div class="row">
                    <p id="error">
                        <?= $_GET['status'] ?>
                    </p>
                </div>
                <?php
            }else{
                ?>
                <div class="row">
                    <p id="success">
                        رمز شما با موفقیت تغییر یافت...
                    </p>
                </div>
                <?php
            }
        }
        ?>
        <div class="row">
            <h2>
                تغییر رمز عبور
            </h2>
        </div>
        <div class="row">
            <label for="name">رمز فعلی</label>
            <input type="password" name="current_pass">
        </div>
        <div class="row">
            <label for="new_pass">رمز جدید</label>
            <input type="password" name="new_pass">
        </div>
        <div class="row">
            <label for="confrim_pass">تکرار رمز جدید</label>
            <input type="password" name="confrim_pass">
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
        $('#pass_form').submit();
    }
</script>
