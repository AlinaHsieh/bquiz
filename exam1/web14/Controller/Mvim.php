<?php include_once "DB.php";
class Mvim extends DB{
    public $header = "動畫圖片管理";
    public $add_header ="新增動畫圖片";

    public function __construct()
    {
        parent::__construct('mvim');

    }

    public function list(){
        $this->view("./view/mvim.php");
    }
}