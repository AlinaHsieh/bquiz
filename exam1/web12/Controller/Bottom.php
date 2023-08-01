<?php
include_once "DB.php";
class Bottom extends DB{
    public $header = "頁尾版權資料管理";
    public function __construct()
    {
        parent:: __construct('bottom');
    }

    public function list(){
        $this->view("./view/bottom.php");
    }
}