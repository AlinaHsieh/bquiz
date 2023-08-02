<?php include_once "DB.php";
class News extends DB{
    public $header = "最新消息資料管理";
    public $add_header;

    public function __construct()
    {
        parent::__construct('news');

    }

    public function list(){
        $this->view("./view/news.php");
    }

    function show(){
        $rows = $this->all(['sh'=>1],'limit 5');
        echo "<ol class='ssaa'>";
            foreach($rows as $idx =>$row){
                echo "<li>";
                echo  mb_substr($row['text'],0,12);
                    echo "<span class='all' style='display:none'>";
                    echo $row['text'];
                    echo "</span>";
                echo "</li>";
            }
        echo "</ol>";
        
    }


    function more(){
     if($this->count(['sh'=>1])>5){
        echo "<a href='?do=news' style='float:right'>More...</a>";
     }
    }

    function morenews(){
        $rows = $this->paginate(5,['sh'=>1]);
        $start=$this->links['start']+1;
        echo "<ol class='sswww' start='$start'>";
        foreach($rows as $row){
            echo "<li class='sswww'>";
            echo    mb_substr($row['text'],0,20);
            echo    "<span class='all' style='display:none'>";
            echo       $row['text'];
            echo    "</span>";
            echo "</li>";
        }
        echo "</ol>";

     }

}