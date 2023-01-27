<?php
// 1. POSTデータ取得

$terminal_name = $_POST['terminal_name'];


$ex_date = $_POST['ex_date'];
// $ex_date = date('Y-m-d');
echo $ex_date;

$grade = $_POST['grade'];
$quantity = $_POST['quantity'];
$delivery_mode = $_POST['delivery_mode'];
$deal_mode = $_POST['deal_mode'];

// 2. DB接続
require_once('funcs_practice.php');
$pdo = db_conn();


// 3.SQL(INSERT INTO table名() VALUES())
// $stmt = $pdo->prepare(
//   "INSERT INTO inventory_test( id, ex_date, terminal_name )
//   VALUES( NULL, :ex_date, :terminal_name )"
// );


$stmt = $pdo->prepare(
    "INSERT INTO inventory_pt(id,ex_date, terminal_name, grade, quantity, delivery_mode, deal_mode, indate )
    VALUES( NULL, DATE('$ex_date'), :terminal_name, :grade, :quantity, :delivery_mode, :deal_mode, sysdate())"
);

// 4.バインド変数
// $stmt->bindValue(':ex_date', $ex_date, PDO::PARAM_STR); 
$stmt->bindValue(':terminal_name', $terminal_name, PDO::PARAM_STR); 
$stmt->bindValue(':grade', $grade, PDO::PARAM_STR); 
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT); 
$stmt->bindValue(':delivery_mode', $delivery_mode, PDO::PARAM_STR); 
$stmt->bindValue(':deal_mode', $deal_mode, PDO::PARAM_STR); 

// 5. 登録実行
$status = $stmt->execute();

// 6. 登録後の処理
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
  }else{
    //５．index.phpへリダイレクト
    redirect('index_practice.php');
  }


?>