<?php
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
    protected $table;
    protected $pdo;
    protected $user = "root";
    protected $pw = "";
    protected $add_header;
    protected $header;
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
    //彈出視窗的模板
    protected function modal($slot){
    ?>
    <h3><?=$this->add_header?></h3>
    <hr>
       <form action="./api/add.php" method="post" enctype="multipart/form-data">
            <table>
            <?=$slot?>
            <tr>
            <input type="hidden" name="table" value="<?=$this->table?>">
            <td><input type="submit" value="新增"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
    </form>
    <?php
    }

    //後台管理畫面(各分頁)模板
    function backend($slot){
    ?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$this->header?></p>
        <form method="post" action="./api/update.php">
            <?php include $slot;?>
        </form>
    </div>
    <?php
    }
}
