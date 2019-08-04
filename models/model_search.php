<?php

class model_search extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getProducts($exist, $keyWord, $orderType1, $orderType2)
    {
        $string = " where 1=1 ";
        if ($exist == 1) {
            $string = $string . "and tedad_mojud > 0";
        }
        if ($keyWord != '') {
            $string = $string . "and esm LIKE '%" . $keyWord . "%' OR nevisande LIKE '%" . $keyWord . "%' ";
        }
        $order = "order by";
        if ($orderType1 == 1) {
            $order = $order . " id ";
        }
        if ($orderType1 == 2) {
            $order = $order . " gheymat ";
        }
        if ($orderType2 == 1) {
            $order = $order . " asc ";
        }
        if ($orderType2 == 2) {
            $order = $order . " desc ";
        }
        $sql = "select * from tbl_books " . $string . " " . $order . " ";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getEntInfo($ident)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $res = $this->doSelect($sql, [$ident], 1);
        return $res;
    }

    function doSearch($data)
    {

        $exist = $data['exist'];
        $idCategory = $data['idCategory'];
        $idCategory = [$idCategory];
        $keyWord = $data['key_word'];
        $orderType1 = $data['orderType1'];
        $orderType2 = $data['orderType2'];
        @$categories = $data['category'];
        @$ents = $data['ent'];
        $products = $this->getProducts($exist, $keyWord, $orderType1, $orderType2);
        foreach ($products as $key => $product) {
            $productCategoryIds = $product['idcategory'];
            $productCategoryIds = explode(',', $productCategoryIds);
            /**/
            $productEntId = $product['identesharat'];
            $entInfo = $this->getEntInfo($productEntId);
            $entName = $entInfo['nam'];
            $products[$key]['entName'] = $entName;
            /**/
            if (isset($data['category'])) {
                $common = array_intersect($categories, $productCategoryIds);
                if (sizeof($common) == 0) {
                    unset($products[$key]);
                }
                $common3 = array_intersect($idCategory, $productCategoryIds);
                if (sizeof($common3) == 0) {
                    unset($products[$key]);
                }
            } else {
                $common4 = array_intersect($idCategory, $productCategoryIds);
                if (sizeof($common4) == 0) {
                    unset($products[$key]);
                }
            }

            $productEntId = explode(' ', $productEntId);
            if (isset($data['ent'])) {
                $common2 = array_intersect($ents, $productEntId);
                if (sizeof($common2) == 0) {
                    unset($products[$key]);
                }
            }
        }
        //$products = array_filter($products);

        $limit = $data['limit'];//tik

        $page_num = sizeof($products)/$limit;
        $page_num = ceil($page_num);

        $currentPage = $data['currentPage'];//tik
        $offset = ($currentPage - 1) * $limit;
        $products = array_slice($products, $offset, $limit);


        return [$products, $page_num];
    }

    function getCategoryInfo($idCategory)
    {
        $sql = "select * from tbl_category where id=?";
        $result = $this->doSelect($sql, [$idCategory], 1);
        /*$catId = $result['id'];
        $sql = "select * from tbl_category where valed=?";
        $subcats = $this->doSelect($sql,[$catId]);
        $result['subcats'] = $subcats;*/
        return $result;
    }

    function getCategories()
    {
        $sql = "select * from tbl_category where valed = 1";
        $res = $this->doSelect($sql);
        return $res;
    }

    function getEntesharats()
    {
        $sql = "select * from tbl_entesharat";
        $result = $this->doSelect($sql);
        return $result;
    }
}