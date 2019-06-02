<?php

class Model
{
    public static $conn = '';

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'pejhvabook';
        $utfArray = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'];
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $utfArray);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }
    function doQuery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }

    public static function getOptions()
    {
        $sql = "select * from tbl_option";
        $options = (new self)->doSelect($sql);
        $options_array = [];
        foreach ($options as $option) {
            $setting = $option['setting'];
            $value = $option['value'];
            $options_array[$setting] = $value;
        }
        return $options_array;
    }

    function calculateDiscount($price, $discount)
    {
        $discount_price = ($price * $discount) / 100;
        $price_total = $price - $discount_price;
        return [$discount_price, $price_total];
    }
}