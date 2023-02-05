<?php
//1.  DB接続します
require_once('funcs_practice.php');


//sessionスタート
session_start();

//ログインチェック
loginCheck();

$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM inventory_pt");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<tr>';
    $view .= '<td colspan="1">';
    $view .= $result['id'] ;
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= $result['ex_date'] ;
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= $result['terminal_name'] ;
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= $result['grade'] ;
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= $result['quantity'];
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= $result['delivery_mode'];
    $view .= "</td>";
    $view .= '<td colspan="1">';
    $view .= '</tr>';
    
  }

}
?>



<!DOCTYPE html>
<html lang='ja'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel="stylesheet" href="./CSS/reset.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./CSS/select.css">
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<title>データ表示</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">出荷実績</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index_practice.php">TOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ex.php">出荷管理</a>
              </li>
        
              <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> -->
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      

</header>

<main>
<div id="form">
<table class="table">
  <thead>
    <tr>
      <th id="id" scope="col" clospan="1">ID</th>
      <th id="ex_date" scope="col" colspan="1">出荷日</th>
      <th id="terminal_name" scope="col" colspan="1">出荷基地</th>
      <th id="grade" scope="col" colspan="1">品種</th>
      <th id="quantity" scope="col" colspan="1">数量</th>
      <th id="delivery_mode" scope="col" colspan="1">出荷形態</th>
      <th id="delivery_mode" scope="col" colspan="1"></th>
    </tr>
  </thead>
  <tbody>
  <?= $view ?>
     
    
    
  </tbody>
</table>

</div>


</main>


<script>


// console.log(a);

</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   

</body>
</html>