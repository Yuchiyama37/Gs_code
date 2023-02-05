<?php

//pwのハッシュ化
$pw = password_hash('test1', PASSWORD_DEFAULT);
// echo $pw;
$pw2 = password_hash('test2', PASSWORD_DEFAULT);
echo $pw2;
//この状態だと元のpwでログインできない

//運用においては初回のユーザー登録時にハッシュ化する

?>