<?php include_once "DB.php";
class Image extends DB{
    public $header = "校園映像資料管理";
    public $add_header= "新增校園映像圖片";

    public function __construct()
    {
        parent::__construct('image');

    }

    public function list(){
        $this->view("./view/image.php");
    }
}