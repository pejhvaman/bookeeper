<style>
    .rightSide {
        width: 250px;
        background: #fff;
        float: right;
    }

    .menuList {
        width: 100%;
        float: right;
        padding: 0;
    }

    .menus {
        width: 84%;
        margin: 20px;
    }

    .menus > a {
        text-decoration: none;
        color: #6f6f6f;
        margin: 15px;
        transition: 0.07s;
    }

    .menus > a:hover {
        opacity: 0.7;
    }

    .activeMenu {
        background: indianred;
        border-radius: 4px;
    }

    li.activeMenu a {
        color: whitesmoke;
    }
</style>
<div class="rightSide sans">
    <ul class="menuList">
        <li class="menus <?php if ($active_menu == 'dashboard') {
            echo 'activeMenu';
        } ?>">
            <a href="">
                داشبورد
            </a>
        </li>
        <li class="menus <?php if ($active_menu == 'category') {
            echo 'activeMenu';
        } ?>">
            <a href="admincategory/index">
                مدیریت دسته ها
            </a>
        </li>
        <li class="menus <?php if ($active_menu == 'product') {
            echo 'activeMenu';
        } ?>">
            <a href="adminproduct/index">
                مدیریت محصولات
            </a>
        </li>
        <li class="menus <?php if ($active_menu == 'order') {
            echo 'activeMenu';
        } ?>">
            <a href="adminorder/index">
                مدیریت سفارشات
            </a>
        </li>
    </ul>
</div>