<?php
//selsect.phpから処理を持ってくる
//1.対象のIDを取得
$id = $_GET['id'];

//2.DB接続します
require_once('funcs_practice.php');
$pdo = db_conn();

//sessionスタート
session_start();

//ログインチェック
loginCheck();

//3.削除SQLを作成
$stmt = $pdo->prepare("DELETE FROM inventory_pt WHERE id=:id");
$stmt->bindvalue(':id',$id, PDO::PARAM_INT);//('仮変数', '代入する変数', 入ってきたvalueを何形式にするか)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
  }else{
    //５．select.phpへリダイレクト
    redirect('select_practice.php');
  }

