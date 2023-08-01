<?php
include_once "DB.php";

class Menu extends DB
{
    public $header = "選單管理";
    public $add_header = "編輯次選單";

    public function __construct()
    {
        parent::__construct('menu');
    }

    function List()
    {
        $this->view("./view/menu.php");
    }

    function show()
    {
        $rows = $this->all(['sh'=>1,'main_id'=>0]);
        foreach($rows as $id =>$row){
            if($this->count(['main_id'=>$row['id']])>0){
                $subs = $this->all(['main_id'=>$row['id']]);
                $rows[$id]['subs']=$subs;
            }
        }
        return $rows;
    }
}
