<?php
include_once "DB.php";
class Menu extends DB{
    public $header = "選單管理";
    public $add_header= "新增主選單";

    public function __construct()
    {
        parent::__construct('menu');

    }

    public function list(){
        $this->view("./view/menu.php");
    }

    public function show(){
        $rows = $this->all(["sh"=>1,'main_id' => 0]);
        foreach($rows as $idx => $row){
            if($this->count(['main_id'=>$row['id']])>0){
           $subs = $this->all(['main_id'=>$row['id']]);
           $rows[$idx]['subs'] = $subs;
            }
        }
        return $rows;
        // dd($rows);
        
    }

}