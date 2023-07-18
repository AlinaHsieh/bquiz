<?php
include_once "DB.php";

class Bottom extends DB{
    public $header = '頁尾版權資料管理';
    public function __construct()
    {
        parent::__construct('bottom');
    }
function show(){
return $this->find(1)['bottom'];
// return $this->all('limit 1')[0]['bottom']; //all出來的陣列是二維陣列，要抓出第0筆資料的['bottom']
}


function list(){
    $this->view("./view/bottom.php");
}
}