<?php
include_once "DB.php";

class News extends DB{
    public $header = '最新消息資料管理';
    public $add_header = '新增最新消息資料';
    public function __construct()
    {
        parent::__construct('news');
    }

    //news彈跳視窗
    public function add_form(){
    $this->modal("<tr>
                    <td>最新消息資料：</td>
                    <td><textarea name='text' width='150px' height='80px'></textarea></td>
                  </tr>","./api/add.php");   
    }

    //news的 back 分頁的內容
    public function list(){
        $this->backend("./view/news.php");
    }
}