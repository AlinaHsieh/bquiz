<?php include_once "DB.php";
class Total extends DB{
    public $header = "網站標題管理";
    public $add_header;

    public function __construct()
    {
        parent::__construct('total');

    }

    public function list(){
        $this->view("./view/total.php");
    }
}