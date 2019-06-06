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

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {
        $new_height = $h;
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
        $what = getimagesize($file);
        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);
                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }
        if ($new_height != ''){
            $newheight = $new_height;
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src,0,0,0,0,$newwidth, $newheight, $width, $height);
        imagejpeg($dst, $pathToSave, 95);
        return $dst;
    }
    function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
    public static function sessionInit()
    {
        session_start();
    }
    public static function sessionSet($name, $value)
    {
        $_SESSION[$name]= $value;
    }
    public static function sessionGet($name)
    {
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }else{
            return false;
        }
    }
}