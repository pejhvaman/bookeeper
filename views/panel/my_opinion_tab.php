<style>
    #my_opinion {
        width: 100%;
        float: right;
    }

    #my_opinion table {
        width: 100%;
        float: right;
        border: 1px solid #e9e9e9;
        color: #6f6f6f;
    }

    #my_opinion table tr {
        height: 45px;
    }

    #my_opinion table tr td {

        text-align: center;
        border-left: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
    }

    #my_opinion table tr td span {
        display: block;
        width: 24px;
        height: 24px;
        margin: auto;
        cursor: pointer;
    }

    #my_opinion table tr td:last-child {
        border-left: unset;
    }

    #my_opinion table tr:last-child td {
        border-bottom: unset;
    }

    #my_opinion table tr:first-child {
        background: #fbfbfb;
    }

    .view_opi {
        background: url(public/images/eye.png) no-repeat center;
    }

    .edit_opi {
        background: url(public/images/edit.png) no-repeat center;
    }

    .delete_opi {
        background: url(public/images/x-button.png) no-repeat center;
    }
</style>
<section id="my_opinion">

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>
                ردیف
            </td>

            <td>
                تاریخ
            </td>
            <td>
                کتاب
            </td>
            <td>
                می پسندم
            </td>
            <td>
                مشاهده
            </td>

            <td>
                ویرایش
            </td>
            <td>
                حذف
            </td>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                97/7/18
            </td>
            <td>
                بیگانه آلبر کامو
            </td>
            <td>
                0
            </td>
            <td>
                <span class="view_opi"></span>
            </td>
            <td>
                <span class="edit_opi"></span>
            </td>
            <td>
                <span class="delete_opi"></span>
            </td>
        </tr>
    </table>
</section>