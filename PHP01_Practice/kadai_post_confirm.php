<?php
// XSS対策関数
function h($value){

    return htmlspecialchars($value,ENT_QUOTES);
    
 }

// フォームから送られてきたデータを取得し変数に代入
$name = $_POST["name"];
$mail = $_POST["mail"];


// 時間取得
$date = date("Y/m/d H:i:s");

// ファイルを読み込む
// var_dump($date);
$file = fopen("./data/data.txt","a");

// ファイルに書き込む
fwrite($file,$date." ".$name." ".$mail."\n");
// fwrite($file,$date." ".$name." ".$mail."\n");

// ファイルを閉じる
fclose($file);

?>

<html>
<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>

    <ul>
        <li> お名前：<?= $name ?> </li>
        <li> Mail:<?= $mail ?> </li>
    </ul>

<ul>
    <li><a href="kadai_post.php">戻る</a></li>
</ul>

<script>



</script>
</body>
</html>