<?php include_once "DB.php";

class Menu extends DB{
    public $header = "選單管理";
    public $add_header = "新增主選單";

    function __construct()
    {
        parent::__construct('menu');
    }


    function add_form(){
        $form = "
        <tr>
            <td>主選單名稱</td>
            <td><input type='text' name='text'></td>
        </tr>
        <tr>
            <td>選單連結網址</td>
            <td><input type='text' name='href'></td>
        </tr>
       
        ";

        echo $form;
    }


    function show(){
        $rows = $this->all(['sh'=>1,'main_id'=>0]);
        foreach($rows as $row){
        echo "<div class='mainmu'>";
        echo "<a href='{$row['href']}'>{$row['text']}</a>";
        echo "</div>";
        }
    } 
}

?>