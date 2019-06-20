<?php

class model_showcart1 extends Model
{
    //private $userId = 0;

    function __construct()
    {
        parent::__construct();
    }

    function getAddress()
    {
        @self::sessionInit();
        $iduser = self::sessionGet('userId');
        $sql = "select * from tbl_user_address where iduser=?";
        $res = $this->doSelect($sql, [$iduser]);
        return $res;
    }

    function addToAddress($data, $addressId)
    {

        @self::sessionInit();
        $iduser = self::sessionGet('userId');
        $nam = $data['nam'];
        $shomare = $data['shomare'];
        $state = $data['state'];
        $shahr = $data['shahr'];
        $adres = $data['adres'];
        $kodposti = $data['kodposti'];


        if ($addressId == '') {
            $sql = "insert into tbl_user_address (iduser, nam, shomare, ostan, shahr, adres, kodposti) values (?,?,?,?,?,?,?)";
            $params = [$iduser, $nam, $shomare, $state, $shahr, $adres, $kodposti];
        } else {
            $sql = "update tbl_user_address set nam=?, shomare=?, ostan=?, shahr=?, adres=?, kodposti=? where id=?";
            $params = [$nam, $shomare, $state, $shahr, $adres, $kodposti, $addressId];
        }
        $this->doQuery($sql, $params);
    }

    function getAddressInfo($id)
    {
        $sql = "select * from tbl_user_address where id=?";
        $res = $this->doSelect($sql, [$id], 1);
        return $res;
    }

    function deleteAddress($id)
    {
        $sql = "delete from tbl_user_address where id=?";
        $this->doQuery($sql, [$id]);
    }

    function getPostTypes()
    {
        $sql = "select * from tbl_post_type";
        $res = $this->doSelect($sql);
        return $res;
    }

    function chosenAddress($id)
    {
        $sql = "select * from tbl_user_address where id=?";
        $res = $this->doSelect($sql, [$id], 1);
        @self::sessionInit();
        self::sessionSet('chosen_address', serialize($res));
    }

    function getTotalPriceOfPrevStep()
    {
        @self::sessionInit();
        $total_price = self::sessionGet('total_price');
        return $total_price;
    }

    function getPostTypePriceById($id)
    {
        $sql = "select * from tbl_post_type where id=?";
        $res = $this->doSelect($sql, [$id], 1);
        $post_type_price = $res['hazine'];
        return $post_type_price;
    }
}