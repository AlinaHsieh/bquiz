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

    function show(){
     $rows = $this->all(['sh'=>1],'limit 5');
     echo "<ol>";
     foreach($rows as $row){
        echo "<li class='ssaa'>";
        echo  mb_substr($row['text'],0,15);
            echo "<span class='all' style='display:none'>";
            echo $row['text'];
            echo "</span>";
        echo "</li>";
     }
     echo "</ol>";
    }

    function more(){
        if($this->all(['sh'=>1])>5){
            echo "<a href='?do=news' style='float:right'>more...";
            echo "</a>";
        }
    }

    function morenews(){
        $rows = $this->paginate(5,['sh'=>1]);
        $start = $this->links['start']+1;
     echo "<ol class='sswww' start='$start'>";
     foreach($rows as $row){
        echo "<li class='sswww'>";
        echo  mb_substr($row['text'],0,15);
            echo "<span class='all' style='display:none'>";
            echo $row['text'];
            echo "</span>";
        echo "</li>";
     }
     echo "</ol>";

    }
}