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
    // public function list(){
    //     $rows = $this->all(['main_id'=>0]); //拿到主選單的列表
    //     foreach($rows as $idx =>$row){ //拆每一筆主選單去計算次選單的數量
    //         $row['subs'] = $this->count(['main_id'=>$row['id']]); // 新增一個$row['subs']的變數是計算次選單數量
    //         $row[$idx]=$row; //把$row['subs']及得到的結果塞回$row陣列
    //     }
    //     $this->view("./view/menu.php",['rows'=>$rows]);
    }
}