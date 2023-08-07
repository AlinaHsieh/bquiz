<?php 
include_once "../base.php"; 
$table = $_POST['table'];
$db = ucfirst($table);
// dd($_POST);

if(!empty($_POST)){
    $row = $$db->find(1);
    switch ($table){
        case 'total':
            $row['total'] = $_POST['total'];
        break;
        case 'bottom':
            $row['bottom'] = $_POST['bottom'];
        break;

    }
    $$db->save($row);
}
to("../backend.php?do=$table");