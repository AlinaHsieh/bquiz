<?php include_once "DB.php";

class News extends DB{
    public $header = "最新消息資料管理";
    public $add_header = "新增最新消息資料";

    function __construct()
    {
        parent::__construct('news');
    }

    function add_form(){
        $form = "
        <tr>
            <td>動態文字廣告</td>
            <td><textarea name='text' style='width:300px;height:100px'></textarea></td>
        </tr>";

        echo $form;
    }

    function show(){
    $rows = $this->all(['sh'=>1]," limit 5");
        echo "<ol class='ssaa'>";
        foreach($rows as $id => $row){
        echo "<li class='all'>";
        echo mb_substr($row['text'],0,15);
        echo "<span class='all' style='display:none'>";
        echo $row['text'];
        echo "</span>";
        echo "</li>";
        
        }
        echo "</ol>";

    } 

    function more(){
        if($this->count(['sh'=>1])>5){
        echo "<a href='?do=news' style='float:right'>more...</a>";
        }
    }

    function morenews(){
        $rows = $this->paginate(5,['sh'=>1]);
        $start = $this->links['start']+1;
        echo "<ol class='ssaa' start=$start+1>";
        foreach($rows as $id => $row){
        echo "<li class='all'>";
        echo mb_substr($row['text'],0,20);
        echo "<span class='all' style='display:none'>";
        echo $row['text'];
        echo "</span>";
        echo "</li>";
        
        }
        echo "</ol>";

    }
}