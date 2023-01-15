<?php
// 時間取得
$date = date("Y/m/d H:i:s");

// ファイルを読み込む
// var_dump($date);
$file = fopen("./data/data.txt","a");


// ファイルに書き込む
fwrite($file,$date."\n");

// ファイルを閉じる
fclose($file);

?>


<html>
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
    <li><a href="index.php">戻る</a></li>
</ul>

</body>
</html>