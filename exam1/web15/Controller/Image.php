<?php include_once "DB.php";

class Image extends DB{
    public $header = "校園映像資料管理";
    public $add_header = "新增校園映像圖片";

    function __construct()
    {
        parent::__construct('image');
    }

    function list(){
        $this->view("./view/image.php");

    }

    function add_form(){
        $form ="<tr>
            <td>校園映像圖片：</td>
            <td><input type='file' name='img'></td>
         </tr>";
         return $form;
     }

     function show(){
        $rows = $this->all(['sh'=>1]);
        foreach($rows as $idx => $row){
            echo "<div class='im cent' id='ssaa{$idx}'>";
            echo "<img src='./upload/{$row['img']}' style='width:150px;height:103px;border:3px solid orange;'>";
            echo "</div>";
        }
     }

     function num(){
        return $this->count(['sh'=>1]);
     }

}