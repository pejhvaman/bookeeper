<?php

class model_panel extends Model
{
    private $user_id;

    function __construct()
    {
        parent::__construct();
        @Model::sessionInit();
        $this->user_id = Model::sessionGet('userId');
    }

    function getUserInfo()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_users where id=?";
        $result = $this->doSelect($sql, [$user_id], 1);
        return $result;
    }

    function getStat()
    {
        $stat = [];
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_order where user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        $stat['orders_num'] = sizeof($result);
        return $stat;
    }

    function getMessages()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_message where user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        return $result;
    }

    function getUserOrders()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select * from tbl_order where user_id=? ORDER by id desc";
        $result = $this->doSelect($sql, [$user_id]);
        //print_r($result);
        return $result;
    }

    function getFav()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        //$sql = "select * from tbl_favorite where user_id=?";
        $sql = "select tbl_favorite.product_id, tbl_favorite.user_id, tbl_books.* from tbl_favorite join tbl_books on tbl_favorite.product_id = tbl_books.id where tbl_favorite.user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        foreach ($result as $key => $item) {
            $id_entesharat = $item['identesharat'];
            $sql = "select * from tbl_entesharat where id=?";
            $entesharat = $this->doSelect($sql, [$id_entesharat], 1);
            $entesharat_nam = $entesharat['nam'];
            $result[$key]['entesharat'] = $entesharat_nam;
        }
        return $result;
    }

    function deleteFav($id)
    {
        $sql = "delete from tbl_favorite where product_id=?";
        $this->doQuery($sql, [$id]);
        $result = $this->getFav();
        return $result;
    }

    function getUserComments()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');
        $sql = "select tbl_comment.*, tbl_books.esm , tbl_books.nevisande from tbl_comment left join tbl_books on tbl_comment.product_id = tbl_books.id where tbl_comment.user_id = ?";
        $result = $this->doSelect($sql, [$user_id]);
        //print_r($result);
        return $result;
    }

    function deleteComment($id)
    {
        $sql = "delete from tbl_comment where id=?";
        $this->doQuery($sql, [$id]);
        $result = $this->getUserComments();
        return $result;
    }

    function getUserCodes()
    {
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');

        $sql = "select * from tbl_takhfif where user_id=?";
        $result = $this->doSelect($sql, [$user_id]);
        foreach ($result as $key => $item) {
            $code = trim($item['kod'], '');
            $sql = "select * from tbl_order where user_id=? and code_takhfif=?";
            $response = $this->doSelect($sql, [$user_id, $code], 1);
            //print_r($response);
            $result[$key]['order_info'] = $response;
            $sabt_time_g = $result[$key]['order_info']['sabt_time'];
            $sabt_time_sh = self::jalaliDate('Y-m-d', $sabt_time_g);
            $result[$key]['order_info']['sabt_time_sh'] = $sabt_time_sh;
            //moghayeseye tarikhha baraye eteber sanji code takhfif:
            $today = self::jalaliDate();
            $expire = $item['end_time'];

            $today = new DateTime($today);
            $expire = new DateTime($expire);

            $status = '';

            if ($expire->format('Y-m-d') >= $today->format('Y-m-d')) {
                $status = 'معتبر';
            } else {
                $status = 'منقضی شده';
            }
            $result[$key]['status'] = $status;
        }

        return $result;
    }

    function saveCode($data)
    {
        $code = $data['code'];
        @Model::sessionInit();
        $user_id = Model::sessionGet('userId');

        $sql = "update tbl_takhfif set user_id=? where kod=?";
        $this->doQuery($sql, [$user_id, $code]);
    }

    function editProfile($data)
    {
        //print_r($data);
        $user_id = $this->user_id;
        $email = $data['email'];
        $nam = $data['name'];
        $code_melli = $data['melli_kod'];
        $tel = $data['tel'];
        $mobile = $data['mobile'];
        $birth_day = $data['birth_day'];
        $birth_month = $data['birth_month'];
        $birth_year = $data['birth_year'];
        $tavalod = $birth_year . '/' . $birth_month . '/' . $birth_day;
        $address = $data['address'];
        $jens = $data['jens'];

        $sql = "update tbl_users set email=?,nam=?,code_melli=?,tel=?,mobile=?,tavalod=?,address=?,jens=? where id=?";
        $params = [$email, $nam, $code_melli, $tel, $mobile, $tavalod, $address, $jens, $user_id];
        $this->doQuery($sql, $params);
    }

    function changePass($data)
    {
        $current_pass = $data['current_pass'];
        $new_pass = $data['new_pass'];
        $confrim_pass = $data['confrim_pass'];

        $user_info = $this->getUserInfo();
        $user_pass = $user_info['ramz'];
        $user_id = $this->user_id;

        $status = '';

        if ($current_pass == $user_pass) {
            if ($new_pass == $confrim_pass) {
                $sql = "update tbl_users set ramz=? where id=?";
                $this->doQuery($sql,[$new_pass, $user_id]);
            } else {
                $status = 'در تکرار رمز عبور جدید دقت کنید...!';
            }
        } else {
            $status = 'رمز عبور فعلی شما نادرست است...!';
        }

        header('location:' . URL . 'panel/changepass?status=' . $status);
    }
}