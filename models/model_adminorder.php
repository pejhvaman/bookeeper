<?php

class model_adminorder extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getOrders()
    {
        $sql = "select * from tbl_order order by id desc";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getOrderInfo($order_id)
    {
        /*$sql = "select * from tbl_order where id=?";*/
        $sql = "select o.*, po.title as postType, pa.title as payType 
        from tbl_order o
        left join tbl_post_type po on o.post_type=po.id
        left join tbl_pay_type pa on o.pay_type=pa.id
        where o.id=?";
        $result = $this->doSelect($sql, [$order_id], 1);
        return $result;
    }

    function changeOrderInfo($order_id, $data)
    {
        $address = $data['address'];
        $code_posti = $data['code_posti'];
        $mobile = $data['mobile'];
        $sql = "update tbl_order set adres_girande=?,kod_posti=?,shomare_mobile=? where id=?";
        $params = [$address, $code_posti, $mobile, $order_id];
        $this->doQuery($sql, $params);
        header('location:' . URL . 'adminorder/detail/' . $order_id);
    }

    function deleteOrder($ids)
    {
        //print_r($ids);
        $ids = join(',', $ids);
        $sql = "delete from tbl_order where id in (" . $ids . ")";
        $this->doQuery($sql);
    }
}

?>