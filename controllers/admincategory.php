<?php

class Admincategory extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $model = new Model;
        $level = $model::getUserLevel();
        if($level != 1){
            header('location:'.URL.'adminlogin');
        }
    }

    function index()
    {
        $categories = $this->model->getCatInfoByvaled(0);
        $data = ['categories' => $categories];
        $this->view('admin/category/index', $data);
    }

    function showSubCats($idcat = 0)
    {
        $subCats = $this->model->getSubCatInfo($idcat);
        $thisValedCatInfo = $this->model->getCatInfoById($idcat);
        $parents = $this->model->getSupCatInfo($idcat);
        $data = ['categories' => $subCats, 'thisValedCat' => $thisValedCatInfo, 'parents' => $parents];
        $this->view('admin/category/index', $data);
    }

    function addcategory($idvaledOrIdcat = 0, $edit = '')
        //$idvaledOrIdcat baraye afzudan idvaled ast va baraye edit idcat ast
        //$edit az href dokmeye virayesh gerefte mishavad va az haminja moshakhas mishavad ke bayad karhaye marbut be edit anjam shavad
    {


        if (isset($_POST['title'])) {
            //in etelaat az add.php va forme an gerefteh mishavad
            $title = $_POST['title'];
            $parent = $_POST['parent'];
            $this->model->addCat($title, $parent, $idvaledOrIdcat, $edit);  //$idvaledOrIdcat ra baraye in mifrestim ke agar virayesh anjam dadim, bedanim kodam idcat ra edit konim
            //$edit ra baraye tashkhise inke bayad insert konim ya update be addCat mifrestim...
        }

        $catInfo = $this->model->getCatInfoById($idvaledOrIdcat); //baraye namayesh dadane etelaate dastei ke mikhahim edit konim


        $cats = $this->model->getCats(); //baraye namayeshe name dasteha va estefade az id anha baraye valuee option ha

        $data = ['cats' => $cats, 'parentId' => $idvaledOrIdcat, 'edit' => $edit, 'catInfo' => $catInfo];
        //$edit baraye in ast ke chon az yek view baraye edit va add estefade mikonim, betavanim ba shartha baraye hardo manzur estefade konim
        $this->view('admin/category/add', $data);
    }

    function deletecategory($thisValedCatId = 0)
    {
        $ids = $_POST['id'];
        $this->model->deleteCategory($ids);
        header('location:' . URL . 'admincategory/showSubCats/' . $thisValedCatId);
    }
}
