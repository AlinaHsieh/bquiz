<?php
include_once "DB.php";
class Menu extends DB{
    public $header = "選單管理";
    public $add_header= "新增主選單";

    public function __construct()
    {
        parent::__construct('menu');

    }

    public function list(){
        $this->view("./view/menu.php");
    }
}