<?php

class model_admincategory extends Model
{
    private $allSubCatIds = [];

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

    function getSubCatInfo($idcat)  //for get lower categories to use in admin/category/index.php and look sub categories
    {
        $subCats = $this->getCatInfoByvaled($idcat);
        return $subCats;
    }

    function getCatInfoById($idcat)
    {
        $sql = "select * from tbl_category where id=?";
        $result = $this->doSelect($sql, [$idcat], 1);
        return $result;
    }

    function getSupCatInfo($idcat) //for get higher categories to use in admin/category/index.php and navigation categories
    {
        $catInfo = $this->getCatInfoById($idcat);
        $parentId = $catInfo['valed'];

        $allParents = [];
        while ($parentId != 0) {
            $sql = "select * from tbl_category where id=?";
            $parents = $this->doSelect($sql, [$parentId], 1);
            array_push($allParents, $parents);
            $parentId = $parents['valed'];
        }
        return $allParents;
    }


    function getCats()  //this func is for get all categories for use in admin/category/add.php
    {
        $sql = "select * from tbl_category";
        $res = $this->doSelect($sql);
        return $res;
    }

    function addCat($title, $parent, $idvaledOrIdcat, $edit)
    {
        if ($edit == '') {
            $sql = "insert into tbl_category (title, valed) values (?, ?)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->execute();
        } else {
            $sql = "update tbl_category set title=?, valed=? where id=?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->bindValue(3, $idvaledOrIdcat);
        }

    }


    function getSubCatsId($ids)
    {
        $subCatIds=[];

        foreach ($ids as $id){
            $subCats = $this->getSubCatInfo($id);
            foreach ($subCats as $subCat){
                array_push($subCatIds,$subCat['id']);
            }
        }
        return $subCatIds;
    }

    function deleteCategory($ids = [])
    {
        $this->allSubCatIds = array_merge($this->allSubCatIds, $ids);
        while (sizeof($ids) > 0){
            $subCatIds = $this->getSubCatsId($ids);
            $this->allSubCatIds = array_merge($this->allSubCatIds, $subCatIds);
            $ids = $subCatIds; //baraye sath'haye baadi
        }

        $idsToDelete = join(',', $this->allSubCatIds);

        $sql = "delete from tbl_category where id IN (".$idsToDelete.")";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

}
