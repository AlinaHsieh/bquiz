<?php 
include_once "../base.php"; 
$table = $_POST['table'];
$db = ucfirst($table);
dd($_POST);

if(!empty($_POST['text'])){
    $rows = $_POST['text'];
}else if(!empty($_POST['id'])){
    $rows = $_POST['id'];
}
foreach($rows as $id =>$text){
    // echo $id;
    // echo $text;
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $$db->del($id);
    }else{
        $row = $$db->find($id);
        
        switch ($table){
            case 'title':
                $row['text'] = $text;
                $row['sh']= ($_POST['sh']==$id)?1:0;
            break;
            case 'ad':
            case 'news':
                $row['text'] = $text;
                $row['sh']= (!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break;
            case 'admin':
                $row['acc'] = $_POST['acc'][$id];
                $row['pw']= $_POST['pw'][$id];
            break;
            case 'menu':
                $row['text'] = $_POST['text'][$id];
                $row['href']= $_POST['href'][$id];
            break;
            default:
            $row['sh']= (!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

               
        }

        // dd($row);
        $$db->save($row);
    }
}

to("../backend.php?do=$table");
