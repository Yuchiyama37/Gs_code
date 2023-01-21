<?php
// topからデータを受信（POST）
$title = $_POST['title'];
$author = $_POST['author'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$name = $_POST['name'];

// DBに接続
require_once('funcs.php');
$pdo = db_conn();//funcsからdb_connを呼び出してDBに接続

// SQL:INSERTを準備
$stmt = $pdo->prepare(
    "INSERT INTO gs_bm_table 
    (id, title, author, url, comment, name, inputdate )
    VALUES(NULL, :title, :author, :url, :comment, :name, sysdate())"
);

//バインド変数
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

//書き込み実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
  }else{
    //top_bm.htmlへリダイレクト
    header('Location: top_bm.html');
  }

?>