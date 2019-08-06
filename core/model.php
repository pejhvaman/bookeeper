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
        //
        require_once('public/jdf/jdf.php');
    }

    function getBasket()
    {
        $sql = "select tbl_basket.tedad, tbl_basket.id as basketId, tbl_books.* from tbl_basket join tbl_books on tbl_basket.idbook = tbl_books.id where tbl_basket.cookie=?";
        $cookie = self::getBasketCookie();
        $param = [$cookie];
        $result = $this->doSelect($sql, $param);

        foreach ($result as $key => $value) {
            $entInfo = $this->getEntInfo($value['identesharat']);
            $result[$key]['entInfo'] = $entInfo;
        }
//tedad ro zarb nemikone...
        $meghdarKolleTakhfif = 0;
        foreach ($result as $key => $item) {
            $price = intval($item['gheymat']);
            $darsadTakhfif = intval($item['takhfif']);
            $meghdarTakhfif = ($price * $darsadTakhfif) / 100;
            $tedad = intval($item['tedad']);
            $meghdarTakhfifBaTedad = $meghdarTakhfif * $tedad;
            $meghdarKolleTakhfif = $meghdarKolleTakhfif + $meghdarTakhfifBaTedad;
        }

        $priceTotalAll = 0;
        foreach ($result as $item) {
            $price = $item['gheymat'];
            $tedad = $item['tedad'];
            $priceTotal = $price * $tedad;
            $priceTotalAll += $priceTotal;
        }
        /*
                $tedad = 0;
                foreach ($result as $item){
                    $tedad = $tedad + $item['tedad'];
                }*/
        //print_r($result);
        return [$result, $priceTotalAll, $meghdarKolleTakhfif];
    }

    function getEntInfo($ident)
    {
        $sql = "select * from tbl_entesharat where id=?";
        $entInfo = $this->doSelect($sql, [$ident], 1);
        return $entInfo;
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
        if ($new_height != '') {
            $newheight = $new_height;
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst, $pathToSave, 95);
        return $dst;
    }

    function delete_directory($dirname)
    {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else
                    delete_directory($dirname . '/' . $file);
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
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function getBasketCookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $expire = time() + 7 * 24 * 3600;
            $value = time();
            setcookie('basket', $value, $expire, '/');
            $cookie = $value;
        }
        return $cookie;
    }

    public static function jalaliDate($format = 'Y/n/j')
    {
        $date = jdate($format);
        return $date;
    }

    public static function jalaliToMiladi($jalali_date, $format = '/')
    {
        $jalali_date_explode = explode('/', $jalali_date);
        $year = $jalali_date_explode[0];
        $month = $jalali_date_explode[1];
        $day = $jalali_date_explode[2];

        $date = jalali_to_gregorian($year, $month, $day);
        $date = implode($format, $date);

        $date = new DateTime($date);
        $date = $date->format('Y/m/d');

        return $date;
    }

    public static function miladiToJalali($miladi_date, $format = '/')
    {
        $miladi_date_explode = explode('/', $miladi_date);
        $year = $miladi_date_explode[0];
        $month = $miladi_date_explode[1];
        $day = $miladi_date_explode[2];

        $date = gregorian_to_jalali($year, $month, $day);
        $date = implode($format, $date);

        return $date;
    }

    function getMenus($idparent = 0)
    {
        $sql = "select * from tbl_category where valed=?";
        $result = $this->doSelect($sql, [$idparent]);

        foreach ($result as $menu) {
            $sub_menu = $this->getMenus($menu['id']);
            if (sizeof([$sub_menu]) > 0) {
                $menu['subMenu'] = $sub_menu;
            }

            @$data[] = $menu;
        }

        return @$data;
    }

    public static function getUserLevel()
    {
        @self::sessionInit();
        $user_id = self::sessionGet('userId');
        $sql = "select * from tbl_users where id=?";
        $res = self::doSelect($sql, [$user_id], 1);
        return $res['sath'];
    }
}