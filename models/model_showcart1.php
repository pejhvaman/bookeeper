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
        self::sessionInit();
        $iduser = self::sessionGet('userId');
        $sql = "select * from tbl_user_address where iduser=?";
        $res = $this->doSelect($sql, [$iduser]);
        return $res;
    }

    function addToAddress($data)
    {
        self::sessionInit();
        $iduser = self::sessionGet('userId');
        $nam = $data['nam'];
        $shomare = $data['shomare'];
        $state = $data['state'];
        $shahr = $data['shahr'];
        $adres = $data['adres'];
        $kodposti = $data['kodposti'];
        $sql = "insert into tbl_user_address (iduser, nam, shomare, ostan, shahr, adres, kodposti) values (?,?,?,?,?,?,?)";
        $params = [$iduser, $nam, $shomare, $state, $shahr, $adres, $kodposti];
        $this->doQuery($sql, $params);
    }

    function getAddressInfo($id)
    {
        $sql = "select * from tbl_user_address where id=?";
        $res = $this->doSelect($sql, [$id],1);
        return $res;
    }

}