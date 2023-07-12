<?php include_once "../base.php";
// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);

if (isset($_POST['text'])) {
    $rows = $_POST['text'];
}else if($table == 'admin'){
    $rows = $_POST['acc'];
} else {
    $rows = array_column($$db->all(), 'img', 'id');
}
// dd($rows);

foreach ($rows as $id => $text) {
// dd($text);

    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $$db->del($id);
        
    } else {
        $row = $$db->find($id); //先撈出資料庫的資料
        // dd($row);
        switch ($table) {
            case 'title':
                $row['text'] = $text;  //用$_POST['text']蓋過去
                $row['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
                break;

            case 'admin':
                $row['acc'] = $text;
                $row['pw'] = $_POST['pw'][$id];  //dd($_POST)會發現：acc與pw的key值($id)是相對應的

                break;

            case 'menu':
                $row['text'] = $text;
                $row['href'] = $_POST['href'][$id];
                $row['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;

            default:
                if(isset($_POST['text'])){
                    $row['text'] = $text;  //用$_POST['text']蓋過去 
                }
            $row['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

        }
        $$db->save($row);
        }
    }

to("../backend.php?do=$table");
