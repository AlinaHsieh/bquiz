<?php
include_once "DB.php";
class Menu extends DB{
    public $header = "網站標題管理";
    public $add_header;

    public function __construct()
    {
        parent::__construct('menu');

    }

    public function list(){
        $this->view("./view/menu.php");
    }
}