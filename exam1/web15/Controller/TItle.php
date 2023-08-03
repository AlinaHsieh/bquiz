<?php include_once "DB.php";

class Title extends DB{
    public $header = "網站標題管理";
    public $add_header = "新增標題圖片";

    function __construct()
    {
        parent::__construct('title');
    }

    function list(){
        $this->view("./view/title.php");

    }

    function add_form(){
       $form ="<tr>
           <td>標題區圖片：</td>
           <td><input type='file' name='img'></td>
        </tr>
        <tr>
           <td>標題區替代文字：</td>
           <td><input type='text' name='text'></td>
       
        </tr>";
        return $form;
    }
}