<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}



//SQLエラー
function sql_error($stmt){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
  header('Location: '.$file_name);
}

//ログインチェック
function loginCheck(){
  if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!=session_id()){
    //預けられている変数の有無確認 // 預けているsession id = 現在の session idが一致しているか//
  exit("Login Error");
  }else{
  session_regenerate_id(true);
  $_SESSION['chk_ssid'] = session_id();
  }
}

//管理者チェック
function adminCheck()
{
  if ($_SESSION['kanri_flg'] === 0) {
    exit("Login Error");
    // redirect("index_practice.php");
  }
}

//
function loginroute(){
  if($_SESSION['kanri_flg'] == 1){
    redirect("admin.php");
  }else{
    redirect("index_practice.php");
  }}