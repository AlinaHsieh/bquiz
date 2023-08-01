<?php include_once "DB.php";
class Image extends DB{
    public $header = "校園映像資料管理";
    public $add_header= "新增校園映像圖片";

    public function __construct()
    {
        parent::__construct('image');

    }

    public function list(){
        $this->view("./view/image.php");
    }

    function show(){
        $rows = $this->all(['sh'=>1]);
        foreach($rows as $idx =>$row){
            echo "<div class ='im cent' id='ssaa{$idx}'>";
            echo "<img src = './upload/{$row['img']}' style='border:3px solid orange;width:150px;height:103px'>";
            echo "</div>";
        }
    }
    function num(){
        return $this->count(['sh'=>1]);
    }
}
