<?php include_once "DB.php";

class Mvim extends DB{
    public $header = "動畫圖片管理";
    public $add_header = "新增動畫圖片";

    function __construct()
    {
        parent::__construct('mvim');
    }

    function list(){
        $this->view("./view/mvim.php");

    }

    function add_form(){
        $form ="<tr>
            <td>動畫圖片：</td>
            <td><input type='file' name='img'></td>
         </tr>";
         return $form;
     }

     function show(){
        $rows = $this->all(['sh'=>1]);
        foreach($rows as $row){
            // echo "<img src='./upload/{$row['img']}'>;";
            echo "lin.push('./upload/{$row['img']}');";
        }
     }
}