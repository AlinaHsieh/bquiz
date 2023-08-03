<?php include_once "DB.php";

class Bottom extends DB{
    public $header = "頁尾版權資料管理";

    function __construct()
    {
        parent::__construct('bottom');
    }

    function list(){
        $this->view("./view/bottom.php");

    }
}