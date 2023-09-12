<?php include_once "DB.php";

class Type extends DB{
    function __construct()
    {
        parent::__construct('types');
    }

    function nav($id){
        if($id==0){
            echo "全部商品";
        }else{
            $row = $this->find($id);
            if($row['big']==0){
                echo $row['name'];
            }else{
                $big = $this->find($row['big']);
                echo $big['name']. " > " .$row['name'];
            }
        }
    }
}