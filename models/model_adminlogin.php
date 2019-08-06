<?php

class model_adminlogin extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function checkUser($form)
    {
        $username = $form['username'];
        $ramz = $form['ramz'];
        $sql = "select * from tbl_users where email = ? and ramz = ?";
        $values = [$username, $ramz];
        $res = $this->doSelect($sql, $values);
        //print_r($res);
        if (sizeof($res) > 0 and !empty($username) and !empty($ramz)) {
            echo 'Correct User Password';
            Model::sessionInit();
            Model::sessionSet('userId', $res[0]['id']);
        } else {
            echo 'Wrong User Password';
        }
    }
}

?>