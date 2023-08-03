<?php include_once "../base.php";
dd($_POST);
$table=$_POST['table'];
$db = ucfirst($table);

if($table=='total'){
    $row = $$db->find(1);
    $row['total'] = $_POST['total'];
}else if($table == 'bottom'){
    $row = $$db->find(1);
    $row['bottom'] = $_POST['bottom'];
}

$$db->save($row);
to("../backend.php?do=$table");