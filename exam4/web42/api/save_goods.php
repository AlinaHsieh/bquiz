<?php include_once "../base.php";
dd($_POST);
if (!empty($_FILES['img']['tmp_name'])) {
    $_POST['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
}

if (!isset($_POST['id'])) {
    $_POST['sh'] = 1;
    $_POST['no'] = rand(100000, 999999);
}

$Goods->save($_POST);

to("../backend.php?do=th");
