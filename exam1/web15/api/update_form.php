<?php include_once "../base.php";

dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);

if(isset($_POST['text'])){
    $rows = $_POST['text'];
}else if(isset($_POST['acc'])){
    $rows = $_POST['acc'];
}else{
    $rows = $_POST['id'];
}
// dd($rows);
foreach($rows as $id => $text){
    if (!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $$db->del($id);
    }else{
        $row = $$db->find($id);
        dd($row);
        switch($table){
            case 'title':
                $row['text']=$text;
                $row['sh'] = ($_POST['sh']==$id)?1:0;
            break;
            case 'ad':
            case "news";
                $row['text']=$text;
                $row['sh'] =(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break;
            case 'mvim':
            case 'image':
                $row['sh'] =(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break;
            case 'admin':
                $row['acc'] = $_POST['acc'][$id];
                $row['pw']= $_POST['pw'][$id];
            break;
            case 'menu':
                $row['text'] = $text;
                $row['href'] = $_POST['href'][$id];
                $row['sh'] = (!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0; 
            break;
        }
        $$db->save($row);
    }
}



to("../backend.php?do=$table");
