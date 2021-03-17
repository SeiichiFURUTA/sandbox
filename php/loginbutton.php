<section id="index.php">
<?php //ログイン後は表示されないように処理
if (!isset($_SESSION['customer'])) {
?>
<a href="index_login.php">ログイン</a>
<?php
}
?>
<?php //ログイン前は表示されないように処理
if (isset($_SESSION['customer'])) {
?>
    <a href="logout.php">ログアウト</a>
<?php
}
?>
</section>