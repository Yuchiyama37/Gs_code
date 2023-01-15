<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../CSS/reset.css">
	<title>POST練習</title>
</head>
<body>

<form action="kadai_post_confirm.php" method="POST">
    <table>
    <tr><td>お名前:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>EMAIL:</td>
        <td><input type="text" name="mail"></td>
    </tr>
    <tr>
        <td>年齢：</td>
        <td>
            <select name="age" id="age">
                <option value="20s">〜29</option>
                <option value="30s">30〜39</option>
                <option value="40over">40〜</option>
                </ul>
            </select>
        </td>
    </tr>
    <tr>
        <td>好きな食べ物は？</td>
        <td>
            <input type="radio" name="q1" value="いちご">
            <label for="q1">いちご</label>
            <br><input type="radio" name="q1" value="バナナ">
            <label for="q1">バナナ</label>
            <br><input type="radio" name="q1" value="スイカ">
            <label for="q1">スイカ</label>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>


    </table>

	<input type="submit" value="送信">
</form>


<ul>
	<li><a href="index.php">戻る</a></li>
</ul>

</body>
</html>
