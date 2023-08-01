<?php
include_once "DB.php";

class News extends DB{
    public $header = "最新消息資料管理";
    public $add_header = "新增最新消息資料";

    public function __construct()
    {
        parent::__construct('news');
    }

    public function list(){
        $this->view("./view/news.php");
    }
}