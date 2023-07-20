<?php
include_once "DB.php";

class Image extends DB{
    public $header = '校園映像資料管理';
    public $add_header = '新增校園映像圖片';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user , $this->pw);
        // $this->table = 'image';
        parent::__construct('image');
    }
    //image彈出視窗的內容
    public function add_form(){
    $this->modal("<tr>
                    <td>校園映像資料圖片：</td>
                    <td><input type='file' name='img'></td>
                    </tr>","./api/add.php");
    
    }

    //  更新圖片按鈕的彈出視窗
    public function update_img($id){
        $form = "<tr>
                 <td>$this->header</td>
                 <td><input type='file' name='img'></td>
                 </tr>
                 <input type='hidden' name='id' value='$id'>
                 ";
            $this->modal($form,"./api/update_img.php");
        }

    //image的 back 分頁的內容
    public function list(){
        $this->view("./view/image.php");
    }

    //校園映像圖片輪播
    public function show(){
        $rows = $this->all(['sh'=>1]);
        foreach($rows as $idx => $row){
            echo "<div class='im' id='ssaa{$idx}'>";
            echo "<img src='./upload/{$row['img']}'>";
            echo "</div>";
        }
    }
    public function num(){
        return $this->count(['sh'=>1]);
    }

}