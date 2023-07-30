<?php
include_once "../base.php";
dd($_POST);
$rows = $_POST['acc'];
foreach ($rows as $id => $text) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $Admin->del($id);
    } else {
        $row = $Admin->find($id);
        $row['acc'] = $text;
        $row['pw'] = $_POST['pw'][$id];
    }
    $Admin->save($row);
}
to("../backend.php?do=admin");
