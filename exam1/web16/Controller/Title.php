<?php include_once "DB.php";

class Title extends DB{
    public $header = "網站標題管理";
    public $add_header = "新增網站標題圖片";

    function __construct()
    {
        parent::__construct('title');
    }

    function add_form(){
        $form = "
        <tr>
            <td>標題區圖片</td>
            <td><input type='file' name='img'></td>
        </tr>
        <tr>
            <td>標題區替代文字</td>
            <td><input type='text' name='text'></td>
        </tr>";

        echo $form;
    }


    function show(){
    
    } 
}