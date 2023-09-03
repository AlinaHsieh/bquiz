<?php 
include_once "DB.php";
include_once "Goods.php"; //一定要記得include_once Goods.php


class Type extends DB{
    function __construct()
    {
        parent::__construct('type');
    }

    function getBig($id){
        $row = $this->find($id);
        return $this->find($row['big']);
    }

    function type($id){ //判斷是大分類or中分類or全部商品
        if($id!=0){
            $row = $this->find($id);
            $type = ($row['big']==0)?'big':'mid';
        }else{
            $type='all';
        }
        return $type;
    }

    function nav($id){ //導覽列：根據得到的$type (大分類/中分類/全部商品)顯示
        $type = $this->type($id); 
        $nav='';
        switch($type){
            case('all'):
                $nav = '全部商品';
                break;
            case('big');
                $row = $this->find($id);
                $nav = $row['name'];
                break;
            case('mid');
                $row = $this->find($id);
                $big = $this->find($row['big']);
                $nav = $big['name']. " > " . $row['name']; 
                break;
        
            }
        return $nav;
    }

    function items($id){ //根據拿到的type去撈取該類別的資料
        $type = $this->type($id); //首先透過GET的id得到是all/big/mid的類別
        switch($type){ //得到類別後進行switch case
            case "all":
                $goods = new Goods;
                $rows = $goods->all(['sh'=>1]);
                break;
            case "big":
                $goods = new Goods;
                $rows = $goods->all(['big'=>$id,'sh'=>1]);
                break;
            case "mid":
                $goods = new Goods;
                $rows = $goods->all(['mid'=>$id,'sh'=>1]);
                break;   

            }

        return $rows;
    }

}