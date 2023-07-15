<?php

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
    protected $table;
    protected $pdo;
    protected $user = "root";
    protected $pw = "";
    // protected $header = [ 'title' =>'網站標題管理',
    //                       'ad' 	=>'動態文字廣告管理',
    //                       'mvim'  =>'動畫圖片管理',
    //                       'image' =>'校園映像資料管理',
    //                       'news' 	=>'最新消息資料管理'];

    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = $table;
    }

    function all(...$arg)
    { //顯示多筆
        $sql = "select * from $this->table";

        if (!empty($arg)) {
            if (is_array($arg[0])) { //判斷是否為陣列
                foreach ($arg[0] as $key => $value) {  //陣列內容字串化
                    $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
                }
                $sql = $sql . "where" . join("&&", $tmp);     //如果是陣列要接條件句
            } else {
                $sql = $sql . $arg[0];
            }
            if (isset($arg[1])) { //如果有第二個參數 -> 字串
                $sql = $sql . $arg[1];
            }
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    { //找一筆
        $sql = "select * from $this->table";

        if (is_array($arg)) { //判斷是否為陣列
            foreach ($arg as $key => $value) {  //陣列內容字串化
                $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
            }
            $sql = $sql . " where " . join("&&", $tmp);     //如果是陣列要接條件句
        } else {
            $sql = $sql . " where `id`='$arg'";
        }
        // echo $sql;

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){ //新增或更新
        // dd($arg);
        if(isset($arg['id'])){
            //update
            foreach ($arg as $key => $value) {  //陣列內容字串化
                $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
            }
            $sql="update $this->table set " . join(',',$tmp). " where `id` = '{$arg['id']}'";
        }else{ //insert
            $cols=array_keys($arg);
            // dd($cols); 
            $sql="insert into $this->table (`".join("`,`",$cols)."`) 
                                      values('".join("','",$arg)."')";
        }
        
        // dd($sql); 

        return $this->pdo->exec($sql);
    }

      /*
     * 刪除資料的方法
     * 限制只能帶入一個參數
     * $arg 如果是陣列，表示要刪除符合陣列條件的資料(可能是多筆刪除)
     * $arg 如果是數字，表示要刪除指定id的資料
     * $arg 如果是字串，表示要刪除指定SQL條件語法的資料
     */

    function del($arg) { //刪除一筆或多筆
        $sql = "delete from $this->table ";
            if (is_array($arg)) {
                foreach ($arg as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql = $sql . " where " . join(" && ", $tmp);
                
            } else if(is_numeric($arg)){
                $sql = $sql ." where `id` =". $arg;
            }else{
                $sql = $sql . $arg;
            }
            echo $sql;
            
            return $this->pdo->exec($sql);
        }

        
    

    function count(...$arg){ //計算筆數
        $result=$this->all(...$arg);//把$arg做解構賦值，並且把結果帶回給$result(得到fetchAll二維陣列)
        return count($result);

        // $sql = "select count(*) from $this->table";

        // if (!empty($arg)) {
        //     if (is_array($arg[0])) { //判斷是否為陣列
        //         foreach ($arg[0] as $key => $value) {  //陣列內容字串化
        //             $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
        //         }
        //         $sql = $sql . "where" . join("&&", $tmp);     //如果是陣列要接條件句
        //     } else {
        //         $sql = $sql . $arg[0];
        //     }
        //     if (isset($arg[1])) { //如果有第二個參數 -> 字串
        //         $sql = $sql . $arg[1];
        //     }
        // }
        // return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($cols,...$arg){
        return $this->math('sum',$cols,...$arg);
    }
    function max($cols,...$arg){
        return $this->math('max',$cols,...$arg);

    }
    function min($cols,...$arg){
        return $this->math('min',$cols,...$arg);

    }
    function avg($cols,...$arg){
        return $this->math('avg',$cols,...$arg);

    }

    function math($math, $cols, ...$arg)
    { //數學方法& 欄位& 篩選條件
        $sql = "select $math(`$cols`) from $this->table";

        if (!empty($arg)) {
            if (is_array($arg[0])) { //判斷是否為陣列
                foreach ($arg[0] as $key => $value) {  //陣列內容字串化
                    $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
                }
                $sql = $sql . "where" . join("&&", $tmp);     //如果是陣列要接條件句
            } else {
                $sql = $sql . $arg[0];
            }
            if (isset($arg[1])) { //如果有第二個參數 -> 字串
                $sql = $sql . $arg[1];
            }
        }


        return $this->pdo->query($sql)->fetchColumn();
    }
}

class Ad extends DB{

    public $header = '動態文字廣告管理';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'ad';
        parent::__construct('ad');
    }
}

class Title extends DB{

    public $header = '網站標題管理';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'title';
        parent::__construct('title');
    }
}

class Image extends DB{
    public $header = '校園映像資料管理';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user , $this->pw);
        // $this->table = 'image';
        parent::__construct('image');
    }
}

class Mvim extends DB{
    public $header = '動畫圖片管理';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'mvim';
        parent::__construct('mvim');
    }
}

class News extends DB{
    public $header = '最新消息資料管理';
    public function __construct()
    {
        parent::__construct('news');
    }
}

class Total extends DB{
    public $header = '進站人數管理';
    public function __construct()
    {
        parent::__construct('total');
    }
}

class Bottom extends DB{
    public $header = '頁尾版權管理';
    public function __construct()
    {
        parent::__construct('bottom');
    }
}
class Admin extends DB{
    public $header = '管理者帳號管理';
    public function __construct()
    {
        parent::__construct('admin');
    }
}


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:" . $url);
}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db11",'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
// $total = new DB('total');
// dd($total->find(1));
// echo $total->sum('id');

$Total = new Total;
$Bottom = new Bottom;
$Title = new Title;
$Ad = new Ad;
$Image = new Image;
$Mvim = new Mvim;
$News = new News;
$Admin = new Admin;

// $Total = new DB("total");
// $Bottom = new DB("bottom");
// $Title = new DB("title");
// $Ad = new DB("ad");
// $Image = new DB("image");