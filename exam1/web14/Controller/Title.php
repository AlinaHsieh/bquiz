<?php 
include_once "DB.php";

class Title extends DB{
    public $header = "網站標題管理";
    public $add_header = "新增標題區圖片";

    public function __construct()
    {
        parent::__construct('title');

    }

    public function list(){
        $this->view("./view/title.php");
    }
    function show(){
        $rows = $this->find(['sh'=>1]);
        return $rows;
    }
}