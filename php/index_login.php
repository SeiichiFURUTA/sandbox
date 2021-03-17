<?php session_start(); ?>
<?php
function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION["customer"])) {
  echo 'ようこそ' .  h($_SESSION["customer"]["email"]) . "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}

 ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="../css/style.css">
 </head>
<body>
   
    <div id="form">
        <p class="form-title">ログイン</p>
        <p id="text">ご登録のメールアドレスとパスワードを入力してください。</p><br>
        <form  action="login.php" method="post">
            <label for="email">email</label>
            <p class="mail"><input type="email" name="email"></p>

            <label for="password">password</label>
            <p class="pass"><input type="password" name="password"></p>
            <p class="submit"> 
            <button type="submit" id="button">Sign In!</button>
          </p>
        </form>
    </div>
 </body>
</html>