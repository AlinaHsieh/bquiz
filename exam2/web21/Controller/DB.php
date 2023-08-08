<?php

class DB{

    protected $dsn = "mysal:host=localhost;charset=utf8;dbname=web21";
    protected $pdo;
    protected $table;
    protected $links;

    function __construct($table)
    {
        $this->pdo=new PDO($this->dsn,'root','');
        $this->table= $table;
    }


    //function
    function all(...$arg){
        $sql = $this->sql_all(" select * from $this->table ",...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    function count(...$arg){
        $sql = $this->sql_all(" select count(*) from $this->table ",...$arg);
        return $this->pdo->query($sql)->fetchColumn();

    }

    function find($arg){
        $sql = $this->sql_one(" select * from $this->table ",$arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }

    function del($arg){
        $sql = $this->sql_one(" delete from $this->table ", $arg);
        return $this->pdo->exec($sql);

    }

    function min($col,...$arg){
      return $this->math('min',$col,...$arg);
    }

    function max($col,...$arg){
      return $this->math('max',$col,...$arg);
    }

    function sum($col,...$arg){
      return $this->math('sum',$col,...$arg);
    }

    function save($sql,...$arg){
        if(isset($arg['id'])){
            $tmp = $this->a2s($arg);
            $sql = " update $this->table set " . join(",",$tmp) . " where `id` = '{$arg['id']}'";
        }else{
            $keys = array_keys($arg);
            $sql = " insert into $this->table (`" . join("`,`",$keys) ."`) values ('" . join("','",$arg) . "')" ;
        }
        return $this->pdo->exec($sql);
    }

    //tools

    function a2s($array){
        foreach($array as $key => $val){
            if($key!='id'){
                $tmp = "`$key`='$val'";
            }
        }
        return $tmp;
    }
    
    protected function sql_all($sql,...$arg){
        if(!empty($arg)){
            if(isset($arg[0])){
                if(is_array($arg)){
                    $tmp = $this->a2s($arg[0]);
                    $sql = $sql . " where " . join(" && ", $tmp);
                }else{
                    $sql = $sql . $arg[0];
                }
            }
            if(isset($arg[1])){
                $sql = $sql . $arg[1];
            }
        }
        return $sql;
    }


    protected function sql_one($sql,$arg){
        if(is_array($arg)){
            $tmp = $this->a2s($arg[0]);
                    $sql = $sql . " where " . join(" && ", $tmp);
                }else{
                    $sql = $sql . " where `id` = '$arg'";
                }
            return $sql;
    }
    protected function math($math,$col,...$arg){
        $sql = " select $math($col) from $this->table ";
        $sql = $this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }



    //view
    function view($path,$arg=[]){
        extract($arg);
        include($path);
    }

    function paginate($num,$arg=null){
        $total = $this->count($arg);
        $pages = ceil($total/$num);
        $now = $_GET['p']??1;
        $start = ($now-1)*$num;
        $rows = $this->all($arg," limit $start, $num");
        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'start'=>$start,
            'rows'=>$rows,
            'table'=>$this->table
        ];
        return $rows;
    }

    function links($do=null){
        $html='';
        if(is_null($do)){
           $this->table = $do;
        }
        if(($this->links['now']-1)>=1){
            $prev=$this->links['now']-1;
            $html.= "<a href='?do=$do&p=$prev'> &lt; </a>";
        }

        for($i=1;$i<=($this->links['pages']);$i++){
            $fontsize = ($_GET['p']==$i)?'24px':'16px';
            $html.= "<a href ='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
        }

        if(($this->links['now']+1)<=$this->links['pages']){
            $next=$this->links['pages']+1;
            $html.= "<a href='?do=$do&p=$next'> &gt; </a>";
        }

        return $html;
    }




}




?>