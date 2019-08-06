<?php

class model_adminslider extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getSlider1()
    {
        $sql = " select * from tbl_slider1 order by id desc ";
        $result = $this->doSelect($sql);
        return $result;
    }

    function addSlider($data, $file)
    {
        //var_dump($file);
        $title = $data['title'];
        $link = $data['link'];
        $idToInsert = $data['id_to_insert'];
        $idToInsert = (int)$idToInsert;
        $file = $file['ax'];

        //upload file:

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmp = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $uploadOk = 1;
        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg' and $fileType != 'image/png') {
            $uploadOk = 0;
        }
        if ($fileSize > 5242880) {
            $uploadOk = 0;
        }
        $targetMain = 'public/images/slider1/';

        $newName = 'slider_' . $idToInsert;
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . $ext;
            move_uploaded_file($fileTmp, $target);
        }

        $sql = "insert into tbl_slider1 (id,title,link,img) values (?,?,?,?)";
        $params = [$idToInsert, $title, $link, $target];
        $this->doQuery($sql, $params);
    }

    function deleteItem($data)
    {
        $ids = $data['ids'];
        $ids = implode(',', $ids);
        $sql = "delete from tbl_slider1 where id in (" . $ids . ") ";
        $this->doQuery($sql);

        $path = 'public/images/slider1/';
        foreach ($data['ids'] as $id) {
            $fileToDelete = $path . 'slider_' . $id . '.png';
            unlink($fileToDelete);
            $fileToDelete = $path . 'slider_' . $id . '.jpg';
            unlink($fileToDelete);
        }
    }

}

?>