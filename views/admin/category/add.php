<?php
require('views/admin/rightSide.php');
?>
<style>
    .leftSide {
        width: 1020px;
        float: left;
        background: #fff;
    }

    .menuContent {
        padding: 20px;
        width: 96%;
        position: relative;
    }

    .menuContent a {
        text-decoration: none;
    }

    .row {
        width: 97%;
        padding: 15px;
    }

    .row .title {
        display: inline-block;
        width: 100px;
    }

    .row input[type=text] {
        width: 40%;
        padding: 10px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        font-family: sans;
        color: #6f6f6f;
    }

    .submitBtn {
        width: 10%;
        padding: 8px;
        border: unset;
        border-radius: 4px;
        color: white;
        background: #d63031;
        position: absolute;
        left: 15px;
        bottom: 15px;
        cursor: pointer;
        font-size: 14pt;
        transition: 0.08s;
    }

    .submitBtn:hover {
        opacity: .7;
    }
    #selectParent{
        width: 20%;
        padding: 8px;
        border: 1px solid #efefef;
        border-radius: 4px;
    }
</style>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            <?php
            $catInfo = $data['catInfo'];
            $edit = $data['edit'];
            if($edit=='') {
                ?>
                افزودن دسته جدید
                <?php
            }else {
                ?>
                 ویرایش دسته
                <?php
            }
            ?>
        </h2>
        <hr>
        <form action="admincategory/addcategory/<?= $catInfo['id'] ?>/<?= $edit ?>" method="post">
            <div class="row">
                <span class="title">
                    عنوان دسته:
                </span>
                <input type="text" name="title" value="<?php if($edit==''){}else{echo $catInfo['title'];} ?>" placeholder="نام دسته جدید را وارد کنید">
            </div>
            <div class="row">
                <span class="title">
                    دسته والد:
                </span>
                <select name="parent" id="selectParent" class="sans font_gray">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $cats = $data['cats'];
                    $parentId = $data['parentId'];
                    if ($edit==''){
                        $selectedId = $catInfo['id']; //chon baraye afzudan ma id daste valed ra mifrestim pas catInfo marbut be daste valed khahad bud va baraye hamin az catInfo['id'] baraye moghayese entekhab kardim.
                    }else{
                        $selectedId =  $catInfo['valed']; //chon baraye edit id daste moredenazar ra mifrestim pas baraye entekhabe dasteye valed be id valede hamin daste ehtiyaj khahim dasht.
                    }
                    foreach ($cats as $cat) {
                        if($cat['id']==$selectedId){   //$selectedId baraye afzudan bayad barabare idvaled'e mazkur, va baraye edit bayad barabare idcat'e mazkur bashad.
                            $selected = 'selected';
                        }else{
                            $selected = '';
                        }
                        ?>
                        <option value="<?= $cat['id'] ?>" <?= $selected ?>>
                            <?= $cat['title'] ?>
                        </option>
                        <?php
                    }
                    ?>

                </select>
            </div>
            <button type="submit" class="submitBtn sans">
                ثبت
            </button>
        </form>
    </div>
</div>
