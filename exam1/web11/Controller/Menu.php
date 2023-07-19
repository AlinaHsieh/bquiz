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
    //顯示前台主選單
    public function show(){
        $rows = $this->all(["sh"=>1, "main_id"=>0]); //撈出主選單資料
        foreach($rows as $idx =>$row){  //拆主選單的陣列
            if($this->count(['main_id'=>$row['id']])>0){  //是否有main_id等於id的值(若有表示有次選單)
                $subs=$this->all(['main_id'=>$row['id']]);  //撈出次選單資料
                $rows[$idx]['subs'] = $subs; //把得到的$subs塞回$rows(以$idx對應)的subs陣列中
            } //如果沒有次選單，就不做處理
        }
        return $rows; //會拿到有subs的$rows,前台index可判斷若$rows有$subs此變數，則撈出次選單
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
    // }
}