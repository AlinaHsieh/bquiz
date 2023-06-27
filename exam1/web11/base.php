<?php

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
    protected $table;
    protected $pdo;
    protected $user = "root";
    protected $pw = "";

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

    function save(...$arg){ //新增或更新
        if(isset($arg['id'])){
            //update
            foreach ($arg as $key => $value) {  //陣列內容字串化
                $tmp[] = "`$key`='$value'"; //把條件做成暫時的字串陣列
            }
            $sql="update $this->table set " . join(',',$tmp). " where `id` = '{$arg['id']}'";
        }else{ //insert
            $cols = array_keys($arg);
            $sql="insert into $this->table (`".join("`,`",$cols)."`) 
                values ('".join("','",$arg)."')";

        }
        return $this->pdo->query($sql);

    }

    function del(...$arg) { //刪除一筆或多筆
        $sql = "delete from $this->table ";
            if (is_array($arg)) {
                foreach ($arg as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }
                $sql += " where " . join(" && ", $tmp);
            } else {
                $sql = $sql . $arg;
            }
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

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location" . $url);
}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db11",'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
// $total = new DB('total');
// dd($total->find(1));
// echo $total->sum('id');
