<?php include_once "DB.php";
class Ad extends DB{
    public $header = "動態文字廣告管理";
    public $add_header="新增動態文字廣告";

    public function __construct()
    {
        parent::__construct('ad');

    }

    public function list(){
        $this->view("./view/ad.php");
    }

    public function show(){
        $rows = $this->all(['sh'=>1]);
        $str = join('&nbsp;&nbsp;',array_column($rows,'text'));
        return $str;
    }
}