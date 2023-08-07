<?php
include_once "../base.php";
$table = $_GET['table'];
$db = ucfirst($table);
$main_id = $_GET['main_id'];
// dd($_GET);
?>

<h2>編輯次選單</h2>
<hr>
<form action="../api/submenu.php" method="post">
    <table id=sub>
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $row = $Menu->all(['main_id'=>$main_id]);
        // dd($row);
        foreach($row as $subs){
        // dd($subs);
        ?>
        <tr>
            <td>
                <input type="text" name="text[<?= $subs['id'] ?>]" value="<?= $subs['text'] ?>">
                <input type="text" name="href[<?= $subs['id'] ?>]" value="<?= $subs['href'] ?>">
                <input type="checkbox" name="del[<?= $subs['id'] ?>]" value="<?= $subs['id'] ?>">
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td>
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
                <input type="button" value="更多次選單" onclick="more()">
                <input type="hidden" name="main_id" value="<?=$main_id?>">
            </td>
        </tr>

       
    </table>
</form>
<script>
    function more(){
        let input = `
            <tr>
                <td>
                    <input type="text" name="text2[]" value="">
                    <input type="text" name="href2[]" value="">
                    <input type="checkbox" name="del2[]" value="">
                    
                </td>
            </tr>`
    $('#sub').append(input)
    }
</script>