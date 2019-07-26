<?php

class model_adminsetting extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function saveSetting($data)
    {
        //print_r($data);
        foreach ($data as $settingName=>$value) {
            $sql = "update tbl_option set value=? where setting=?";
            $params = [$value, $settingName];
            $this->doQuery($sql, $params);
        }
    }
}

?>