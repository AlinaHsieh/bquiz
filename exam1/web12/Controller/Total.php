<?php
include_once "DB.php";

class Total extends DB{
    public $header = "進站總人數管理";

    public function __construct()
    {
        parent:: __construct('total');
    }

    function list(){
        $this->view("./view/total.php");
    }

}