<?php
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    protected $pw = "";
    protected $user = "root";
    protected $table;
    protected $pdo;

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

    function save($arg)
    { //新增或更新
        if (isset($arg['id'])) {
            //update
            foreach ($arg as $key => $value) {  //陣列內容字串化
                $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
            }
            $sql = "update $this->table set " . join(',', $tmp) . " where `id` = '{$arg['id']}'";
            // echo $sql;

        } else { //insert
            $cols = array_keys($arg);
            $sql = "insert into $this->table (`" . join("`,`", $cols) . "`) 
                values ('" . join("','", $arg) . "')";
            // echo $sql;
        }
        return $this->pdo->exec($sql);
    }

    function del($arg){  //刪除一筆或多筆
        $sql = "delete from $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql = $sql . " where " . join(" && ", $tmp);
            // echo $sql;
        }else if(is_numeric($arg)){
            $sql = $sql . "where `id` = ". $arg;
            // echo $sql;
        } else {
            $sql = $sql . $arg;
            // echo $sql;

        }
        return $this->pdo->exec($sql);
    }


    function count(...$arg)
    { //計算筆數
        $result = $this->all(...$arg); //把$arg做解構賦值，並且把結果帶回給$result(得到fetchAll二維陣列)
        return count($result);
    }

    function sum($cols, ...$arg)
    {
        return $this->math('sum', $cols, ...$arg);
    }
    function max($cols, ...$arg)
    {
        return $this->math('max', $cols, ...$arg);
    }
    function min($cols, ...$arg)
    {
        return $this->math('min', $cols, ...$arg);
    }
    function avg($cols, ...$arg)
    {
        return $this->math('avg', $cols, ...$arg);
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

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

function q($sql)
{
    $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=db12", 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

///繼承class

class Title extends DB
{
    public $header = '網站標題管理';
    public $add_header = '新增網站標題圖片';
    public function __construct()
    {
        parent::__construct('title');
        
    }
    function add_form(){
     ?>
        <div>
           標題區圖片：<input type="file" name="img">
        </div>
        <div>
            標題區替代文字<input type="text" name="text">
        </div>
     
     <?php
    }
}

class Ad extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'ad';
        $this->header = '動態文字廣告';
        $this->add_header = '新增動態文字廣告';
    }
    function add_form(){
        ?>
    <div>
    動態文字廣告<input type="text" name="text">
    </div>
        <?php
    }
}

class Admin extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'admin';
        $this->header = '管理者帳號管理';
        $this->add_header = '新增管理者帳號';
    }
    function add_form(){
        ?>
    <div>
        <td>帳號：</td>
        <td><input type="text" name="acc"></td>
    </div>
    <div>
        <td>密碼：</td>
        <td><input type="password" name="pw"></td>
        
    </div>
    <div>
        確認密碼：<input type="password" name="pw2">
    </div>
        <?php
    }
}

class Menu extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'menu';
        $this->header = '選單管理';
        $this->add_header = '新增主選單';
    }
    function add_form(){
        ?>
    <div>
        <td>主選單名稱：</td>
        <td><input type="text" name="text"></td>
    </div>
    <div>
        <td>選單連結網址：</td>
        <td><input type="text" name="href"></td>
        
    </div>
        <?php
    }
}

class Image extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'image';
        $this->header = '校園映像資料管理';
        $this->add_header = '新增校園映像圖片';
    }
    function add_form(){
        ?>
    <div>
        校園映像圖片：<input type="file" name="img">
    </div>
        <?php
    }
}

class Bottom extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'bottom';
        $this->header = '頁尾版權資料管理';
    }
}

class Mvim extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'mvim';
        $this->header = '動畫圖片管理';
        $this->add_header = '新增動畫圖片';
    }
    function add_form(){
        ?>
     <div>
        動畫圖片：<input type="file" name="img">
    </div>
        <?php
    }
}

class Total extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'total';
        $this->header = '進站總人數管理';
    }
}

class News extends DB
{
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        $this->table = 'news';
        $this->header = '最新消息管理';
        $this->add_header = '新增最新消息資料';
    }
    function add_form(){
        ?>
      <div>
      <td>
      最新消息資料
      </td>
      <td>
         <textarea name="text" style="width: 400px; height:200px;"></textarea>
      </td>
        <?php
    }
}


$Total = new Total();
$Bottom = new Bottom();
$Title = new Title();
$Ad = new Ad();
$Image = new Image();
$Mvim = new Mvim();
$News = new News();
$Admin = new Admin();
$Menu = new Menu();
// $Total = new DB("total");

