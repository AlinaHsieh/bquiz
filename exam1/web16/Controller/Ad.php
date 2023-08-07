<?php include_once "DB.php";

class Ad extends DB{
    public $header = "動態文字廣告管理";
    public $add_header = "新增動態文字廣告";

    function __construct()
    {
        parent::__construct('ad');
    }

    function add_form(){
        $form = "
        <tr>
            <td>動態文字廣告</td>
            <td><input type='text' name='text'></td>
        </tr>";

        echo $form;
    }

    function show(){
    $rows = $this->all(['sh'=>1]);
        foreach($rows as $row){
            echo $row['text'] . "&nbsp;&nbsp;&nbsp;";
        }
    } 
}