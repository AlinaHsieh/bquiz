<?php
include_once "DB.php";

class Menu extends DB{
    public $header = '選單管理';
    public $add_header = '新增選單';
    public function __construct()
    {
        parent::__construct('menu');
    }

    //menu彈跳視窗
    public function add_form(){
    $this->modal("<tr>
                      <td>主選單名稱：</td>
                      <td><input type='text' name='text'></td>
                  </tr>
                  <tr>
                      <td>選單連結網址：</td>
                      <td><input type='text' name='href'></td>
                  </tr>","./api/add.php");    
    }

    //menu的 back 分頁的內容
    public function list(){
        $this->view("./view/menu.php");
    }
}