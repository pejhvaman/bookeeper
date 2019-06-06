<?php

class model_login extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkUser($form)
    {
        $email = $form['email'];
        $ramz = $form['ramz'];
        $sql = "select * from tbl_users where email = ? and ramz = ?";
        $values = [$email, $ramz];
        $res = $this->doSelect($sql, $values);
        //print_r($res);
        if (sizeof($res) > 0 and !empty($email) and !empty($ramz)) {
            echo 'Correct User Password';
            Model::sessionInit();
            Model::sessionSet('userId', $res[0]['id']);
        } else {
            echo 'Wrong User Password';
        }
    }
}