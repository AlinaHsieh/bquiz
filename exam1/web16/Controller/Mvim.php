<?php include_once "DB.php";

class Mvim extends DB{
    public $header = "動畫圖片管理";
    public $add_header = "新增動畫圖片";

    function __construct()
    {
        parent::__construct('mvim');
    }


    function add_form(){
        $form = "
        <tr>
            <td>標題區圖片</td>
            <td><input type='file' name='img'></td>
        </tr>";

        echo $form;
    }


    function show(){
    $rows = $this->all(['sh'=>1]);
        foreach($rows as $row){
            echo "lin.push('../upload/{$row['img']}');";
        }
    } 
}