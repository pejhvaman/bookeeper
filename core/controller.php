<?php
class Controller
{
    function __construct()
    {
    }
    function view($viewUrl, $data=[], $seen=1)
    {

        if($seen == 1){
            require ('header.php');
        }
        require ('views/'.$viewUrl.'.php');

        if($seen == 1){
            require ('footer.php');
        }
    }
    function model($modelUrl)
    {
        require ('models/model_'.$modelUrl.'.php');
        $className = 'model_'.$modelUrl;
        $this->model = new $className;  //model be surate yek property'e public tarif shode ast...
    }
}