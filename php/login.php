<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toppage.css">
</head>
<body>
<?php

require_once('db_connect.php');
//POSTのvalidate
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
//DB内でPOSTされたメールアドレスを検索
try {
  $stmt = $pdo->prepare('select * from userDeta where email = ?');
  $stmt->execute([$_POST['email']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//emailがDB内に存在しているか確認
if (!isset($row['email'])) {
    ?>
    <br><br><h2>メールアドレス又はパスワードが間違っています。</h2>
  <?php
  return false;
}
//パスワード確認後sessionにメールアドレスを渡す
if ($row['password']===$_POST['password']) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['customer'] = [
  'email' => $row['email'],'password' => $row['password'],'id' => $row['id']];?>
  <br><br><h2>ログインが完了しました。</h2>
<?php
} else {
    ?>
    <br><br><h2>メールアドレス又はパスワードが間違っています。</h2>
  <?php
  return false;
}?>
    <br>
    <h3><a href="index.php" id="button">トップページ</a>
    </h3>
</body>
