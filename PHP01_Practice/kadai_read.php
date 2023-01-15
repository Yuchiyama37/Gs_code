<?php
// XSS対策関数
function h($value){

    return htmlspecialchars($value,ENT_QUOTES);
    
 }

// ファイルを変数に格納
$datafile = "./data/data.txt";

// fopenでファイルを開く（'r'は読み込みモードで開く）
$file = fopen($datafile,"r");


// whileで行末までループ処理
while (!feof($file)) {
    // feof end of flie : ファイルの最後まで読み込み
    
    // fgetsでファイルを読み込み、変数に格納
    $txt = fgets($file);

   
    // ファイルを読み込んだ変数を出力
    echo h($txt).'<br>';
    // hでXSS対策関数呼び出し

}


 
// fcloseでファイルを閉じる
fclose($file);


?>

<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>POST練習</title>
</head>
<body>
    <a href="index.php">戻る</a>


</body>
</html>