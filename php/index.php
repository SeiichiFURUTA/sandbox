<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ</title>
  <link rel="stylesheet" href="../css/toppage.css">
</head>
<body>
<header>
<div id="fixed">
<nav id ="global_navi">
  <ul>
    <li><a href="pass_list.php">アトラクション</a></li>   
    <li><?php require_once("loginbutton.php"); ?></li>
  </ul>
</nav>
</div>
</header>
<div class="page">
</div>
<img src="../images/遊園地top2.jpg" class="image-vw">
<!-- <p>サンプル<img src="images/face.png" alt="face"></p>
<script src="js/code.js"></script> -->
    <h2>オススメのアトラクション</h2>
        <go>ゴーカート</go>
<br>
          <img src="../images/go_cart.png" class="image-cart">
<br>
<br>
<br>
        <go>観覧車</go>
<br>
          <img src="../images/ferris_wheel.png" class="image-cart">
<br>
<br>
<br>
        <go>ジェットコースター</go>
<br>
          <img src="../images/roller_coaster.png" class="image-cart">
<br>
<br>
<br>
        <go>メリーゴーランド</go>
<br>
          <img src="../images/merry_go_round.png" class="image-cart">
<footer>
  <div id="footer_nav">
  <ul>
    <!-- アトラクションのところに行く -->
    <li><a href="pass_list.php">アトラクション</a></li>
    <?php //ログイン後は表示されないように処理
if (!isset($_SESSION['customer'])) {
?>
<li><a href="index_login.php">ログイン</a></li>
<?php
}
?>

<?php //ログイン前は表示されないように処理
if (isset($_SESSION['customer'])) {
?>
  <li><a href="logout.php">ログアウト</a></li>
<?php
}
?>

  </ul>
  <!-- トップの戻るボタン -->
<div id="page_top"><a href="#"></a></div>
  </div>
</footer>
</body>
</html>