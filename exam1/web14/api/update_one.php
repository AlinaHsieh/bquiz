<?php
include_once "../base.php";
$table = $_POST['table'];
$db = ucfirst($table);
$row = $$db->find(1);
dd($row);
if($table == 'total'){
    $row['total'] = $_POST['total'];
    $$db->save($row);
}else if($table == 'bottom'){
    $row['bottom'] = $_POST['bottom'];
    $$db->save($row);
}
to("../backend.php?do=$table");