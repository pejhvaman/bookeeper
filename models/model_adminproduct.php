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
            $discount_price = $this->calculateDiscount($row['gheymat'], $row['takhfif'])[0];
            $result[$key]['discount_price'] = $discount_price;
        }
        return $result;
    }

    function getCats()  //this func is for get all categories for use in admin/category/add.php
    {
        $sql = "select * from tbl_category where valed!=0";
        $res = $this->doSelect($sql);
        return $res;
    }

    function getEntesharat()
    {
        $sql = "select * from tbl_entesharat";
        $res = $this->doSelect($sql);
        return $res;
    }

    function addProduct($data = [], $idbook, $file=[])
    {
        //var_dump($file);
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
            $this->doQuery($sql, $values);
            $idbook = parent::$conn->lastInsertId();
            mkdir('public/images/books/'.$idbook);
        } else {
            $sql = "update tbl_books set esm=?, nevisande=?, motarjem=?, gheymat=?, moarefi=?, tedad_mojud=?, takhfif=?, identesharat=?, idcategory=? where id=?";
            $values = [$title, $nevisande, $motarjem, $gheymat, $moarefi, $tedad_mojud, $takhfif, $entesharat, $categories, $idbook];
            $this->doQuery($sql, $values);
        }


        //upload file:
        //var_dump($file);
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmp = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $uploadOk = 1;
        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType!='image/png') {
            $uploadOk = 0;
        }
        if ($fileSize > 5242880) {
            $uploadOk = 0;
        }
        $targetMain = 'public/images/books/'.$idbook.'/';
        $newName = 'book';
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . $ext;
            move_uploaded_file($fileTmp, $target);

            $target250 = $targetMain.$newName.'_250.'.$ext;
            $this->create_thumbnail($target, $target250, 250, 350);
            $target100 = $targetMain.$newName.'_100.'.$ext;
            $this->create_thumbnail($target, $target100, 100, 150);
        }

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
        if (isset($bookInfo['identesharat'])) {
            $identesharat = $bookInfo['identesharat'];
            $entInfo = $this->getEntInfo($identesharat);
            $bookInfo['entesharat'] = $entInfo;
        }


        return $bookInfo;
    }

    function getEntInfo($ident)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $entInfo = $this->doSelect($sql, [$ident], 1);
        return $entInfo['nam'];
    }

    function deleteProduct($ids = [])
    {
        //var_dump($ids);
        $ids = join(',', $ids);
        $sql = "delete from tbl_books where id in (" . $ids . ")";
        $this->doQuery($sql);
        //in raveshe neveshtane querye delete behine tar az foreach ast...
        $sql = "delete from tbl_property where idbook in (" . $ids . ")";
        $this->doQuery($sql);


        $path = 'public/images/books/';
        $ids = explode(',', $ids);
        foreach ($ids as $id){
            $pathToDelete = $path.$id.'/';
            parent::delete_directory($pathToDelete);
        }

    }

    function getProperty($idbook)
    {
        $sql = "select * from tbl_property where idbook=? order by id desc ";
        $propertyInfo = $this->doSelect($sql, [$idbook]);
        //print_r($propertyInfo);
        return $propertyInfo;
    }

    function addProperty($data = [], $idbook, $idproperty)
    {
        $title = $data['title'];
        $tozihat = $data['tozihat'];
        if ($idproperty == '') {
            $sql = "insert into tbl_property (title, tozihat, idbook) values (?, ? ,?)";
            $values = [$title, $tozihat, $idbook];
        } else {
            $sql = "update tbl_property set title=?, tozihat=? where id=?";
            $values = [$title, $tozihat, $idproperty];
        }
        $this->doQuery($sql, $values);
    }

    function getPropertyInfo($id)
    {
        $sql = "select * from tbl_property where id=?";
        $res = $this->doSelect($sql, [$id], 1);
        return $res;
    }

    function deleteProperty($ids = [])
    {
        $ids = join(',', $ids);
        $sql = "delete from tbl_property where id in (" . $ids . ")";
        $this->doQuery($sql);
    }
}
