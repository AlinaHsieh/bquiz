<?php include_once "../base.php";

dd($_POST);
$table = $_POST['table'];
$db=ucfirst($table);
$data = [];

if(!empty($_FILES['img']['tmp_name'])){
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/' . $_FILES['img']['name']);
}

if(isset($_POST['text'])){
    $data['text'] = $_POST['text'];
}

switch ($table){
    case 'title':
        $data['sh'] =0;
    break;
    case 'admin':
        $data['acc'] = $_POST['acc'];
        $data['pw'] = $_POST['pw'];
    break;
    case 'menu':
        $data['href'] = $_POST['href'];
        $data['main_id']=0;
    break;
    
    default:
    $data['sh'] =1;
}
dd($data);

$$db->save($data);
to("../backend.php?do=$table");

