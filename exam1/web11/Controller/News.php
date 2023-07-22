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
        $this->view("./view/news.php");
    }

    public function show(){
        $rows = $this->all(['sh'=>1],'limit 5');
        echo "<ol class='ssaa'>";
        foreach($rows as $row){
            echo "<li>";
            echo mb_substr($row['text'],0,15);
                echo "<span class='all' style='display:none'>";
                echo $row['text'];
                echo "</span>";
            echo "</li>";
        }
        echo "</ol>";
    }

    public function num(){ //計算有多少筆最新消息要被顯示
        return $this->count(['sh'=>1]);
    }

    public function more(){ //最新消息區若資料大於5比則顯示more
        if($this->count(['sh'=>1])>5){
            echo "<a href='?do=news' style='float:right'>More...</a>";
        }
    }

    function moreNews(){
        $rows = $this->paginate(5,['sh'=>1]);
        $start = $this->links['start']+1;
        echo "<ol class='ssaa' start='$start'>";
        foreach($rows as $row){
            echo "<li class='sswww'>";
            echo mb_substr($row['text'],0,15);
            echo "<span class='all' style='display:none'>";
            echo $row['text'];
            echo "</span>";
            echo "</li>";

        }
        echo "</ol>";
    }
}