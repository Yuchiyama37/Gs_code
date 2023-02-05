<?php

//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs_practice.php');

//sessionスタート
session_start();

//ログインチェック
loginCheck();

$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET['id'];
// echo $id;

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM inventory_pt WHERE id=:id");
$stmt->bindvalue(':id',$id, PDO::PARAM_INT);//('仮変数', '代入する変数', 入ってきたvalueを何形式にするか)
$status = $stmt->execute();

//4．データ表示
$view = "";
if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $result = $stmt->fetch();
    var_dump($result['quantity']);
}

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
<td><input name="terminal_name" type="text" value=<?= $result['terminal_name']?>></td>
<th>出荷日</th>
<td><input name="ex_date" type="date" value=<?= $result['ex_date']?>></td>
<th>品種</th>
<td>
    <input name="grade" type="text" value=<?= $result['grade']?>>
</td>
<th>数量</th>
<td>
    <input name="quantity" type="text" <?= $result['quantity']?>>
    <!-- INT型をテキストボックスにそのまま入れられないので変換する必要あり-->

</td>
<th>出荷形態</th>
<td>
<input name="delivery_mode" type="text" value=<?= $result['delivery_mode']?>>
</td>
<th>取引形態</th>
<td>
<input name="deal_mode" type="text" value=<?= $result['deal_mode']?>>
    </select>
</td>
<th><input type="submit" value="登録"></th>
</tr>



</table>

</form>
<!-- Main[End] -->

</body>
</html>