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

    function show(){
        $rows = $this->all(['sh'=>1]);
        foreach($rows as $row){
            echo "lin.push('./upload/{$row['img']}');";
        }
    }
}
