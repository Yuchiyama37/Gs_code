<?php


//1.対象のIDを取得
// $id = $_GET['id'];


require_once('funcs_practice.php');



//2.DB接続します
//sessionスタート
session_start();

//ログインチェック
loginCheck();

$pdo = db_conn();

?>




<!DOCTYPE html>
<html lang='ja'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>
<body>





<!-- Main[Start] -->
<form method="POST" action="insert_practice.php">
<table>
<tr class="Chiba">
<th>出荷地</th>
<td><input name="terminal_name" type="text" value="千葉"></td>
<th>出荷日</th>
<td><input name="ex_date" type="date"></td>
<th>品種</th>
<td>
    <select name="grade" id="">
        <option value="プロパン">プロパン</option>
        <option value="ブタン">ブタン</option>
    </select>
</td>
<th>数量</th>
<td><input name="quantity" type="text"></td>
<th>出荷形態</th>
<td>
    <select name="delivery_mode" id="deliveryMode">
        <option value="L/Y">L/Y</option>
        <option value="C/T">C/T</option>
    </select>
</td>
<th>取引形態</th>
<td>
    <select name="deal_mode" id="dealMode">
        <option value="販売">販売</option>
        <option value="バーター">バーター</option>
    </select>
</td>
<th><input type="submit" value="登録"></th>
</tr>



</table>

</form>
<!-- Main[End] -->

</body>
</html>