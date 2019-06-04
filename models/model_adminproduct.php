<?php

class model_adminproduct extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getCatInfoByvaled($idvaled)
    {
        $sql = "select * from tbl_category where valed=?";
        $result = $this->doSelect($sql, [$idvaled]);
        return $result;
    }

    function getBooks()
    {
        $sql = "select * from tbl_books order by id desc ";
        $result = $this->doSelect($sql);
        foreach ($result as $key => $row) {
            $total_price = $this->calculateDiscount($row['gheymat'], $row['takhfif'])[0];
            $result[$key]['total_price'] = $total_price;
        }
        return $result;
    }

    function getCats()  //this func is for get all categories for use in admin/category/add.php
    {
        $sql = "select * from tbl_category";
        $res = $this->doSelect($sql);
        return $res;
    }

    function getEntesharat()
    {
        $sql = "select * from tbl_entesharat";
        $res = $this->doSelect($sql);
        return $res;
    }

    function addProduct($data = [], $idbook)
    {
        $title = $data['title'];
        $nevisande = $data['nevisande'];
        $motarjem = $data['motarjem'];
        $gheymat = $data['gheymat'];
        $moarefi = $data['moarefi'];
        $tedad_mojud = $data['tedad_mojud'];
        $takhfif = $data['takhfif'];
        $entesharat = $data['entesharat'];

        $categories = '';
        if (isset($data['cat'])) {
            $categories = $data['cat'];
            $categories = join(',', $categories);
        }


        if ($idbook == '') {
            $sql = "insert into tbl_books (esm, nevisande, motarjem, gheymat, moarefi, tedad_mojud, takhfif, identesharat, idcategory) values (?,?,?,?,?,?,?,?,?)";
            $values = [$title, $nevisande, $motarjem, $gheymat, $moarefi, $tedad_mojud, $takhfif, $entesharat, $categories];
        } else {
            $sql = "update tbl_books set esm=?, nevisande=?, motarjem=?, gheymat=?, moarefi=?, tedad_mojud=?, takhfif=?, identesharat=?, idcategory=? where id=?";
            $values = [$title, $nevisande, $motarjem, $gheymat, $moarefi, $tedad_mojud, $takhfif, $entesharat, $categories, $idbook];
        }
        $this->doQuery($sql, $values);
    }

    function getProductInfo($idbook)
    {
        $sql = "select * from tbl_books where id=?";
        $bookInfo = $this->doSelect($sql, [$idbook], 1);
        $idcategory = $bookInfo['idcategory'];
        $idcategory = explode(',', $idcategory);
        $idcategory = array_filter($idcategory);
        $allCategoriesInfo = [];
        foreach ($idcategory as $idcat) {
            $sql = "select * from tbl_category where id=?";
            $categoryInfo = $this->doSelect($sql, [$idcat], 1);
            array_push($allCategoriesInfo, $categoryInfo);
        }
        $bookInfo['allCatsInfo'] = $allCategoriesInfo;
        return $bookInfo;
    }

    function deleteProduct($ids = [])
    {
        //var_dump($ids);
        $ids = join(',', $ids);
        $sql = "delete from tbl_books where id in (" . $ids . ")";
        $this->doQuery($sql);
    }
}
