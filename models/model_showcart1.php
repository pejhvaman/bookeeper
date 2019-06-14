<?php

class model_showcart1 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAddress()
    {
        $sql = "select * from tbl_user_address";
        $res = $this->doSelect($sql);
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
}