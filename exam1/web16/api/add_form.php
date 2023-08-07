<?php 
include_once "../base.php"; 
$table = $_POST['table'];
$db = ucfirst($table);
// dd($_POST);
$data = [];

if(file_exists($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/{$_FILES['img']['name']}");
}
    switch ($table){
        case 'title':
            $data['text'] = $_POST['text'];
            $data['sh'] = 0; 
        break;
        case 'news':
            $data['text'] = $_POST['text'];
            $data['sh'] = 1; 
        break;
        case 'ad':
            $data['text'] = $_POST['text'];
            $data['sh'] = 1; 
        break;
        case 'admin':
            $data['acc'] = $_POST['acc'];
            $data['pw'] = $_POST['pw'];
            // $data['sh'] = 1; 

        break;
        case 'menu':
            $data['text'] = $_POST['text'];
            $data['href'] = $_POST['href'];
            $data['sh'] = 1; 
        break;
        default:
        $data['sh'] = 1; 
            
        }


$$db->save($data);
to("../backend.php?do=$table");

