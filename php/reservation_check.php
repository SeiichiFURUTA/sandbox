<?php session_start(); ?>
<?php
$attraction = $_GET['attraction'];
$playtime = "";
$adult_count = 0;
$child_count = 0;

if (isset($_POST["postSelection"])){
    $playtime = $_POST["hour_time"].":".$_POST["minutes_time"];
    $adult_count = $_POST["adult_count"];
    $child_count = $_POST["child_count"];
}

$total = $adult_count + $child_count; //人数の合計
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間・人数の確認</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toppage.css">
</head>
<body>

<header>
<nav id ="global_navi">
  <ul>
    <li><a href="pass_list.php">アトラクション</a></li>   
    <li><?php require_once("loginbutton.php"); ?></li>
<li><a href="reservation_confirmation.php">予約確認画面</a></li>
  </ul>
</nav>
</header>

<ul class="stepbar">
	<li class="stepbar__item"><div class="stepbar__item-inner">選択</div></li>
	<li class="stepbar__item"><div class="stepbar__item-inner stepbar__item-inner--current">確認</div></li>
	<li class="stepbar__item"><div class="stepbar__item-inner">完了</div></li>
</ul>
<?php
if($attraction == 0){
    echo '<h2>ジェットコースター</h2>';
    echo '<img src="../images/roller_coaster.png" id="img">';
}else if($attraction == 1){
    echo '<h2>観覧車</h2>';
    echo '<img src="../images/ferris_wheel.png" id="img">';
}else if($attraction == 2){
    echo '<h2>ゴーカート</h2>';
    echo '<img src="../images/go_cart.png" id="img">';
}else if($attraction == 3){
    echo '<h2>メリーゴーランド</h2>';
    echo '<img src="../images/merry_go_round.png" id="img">';
}
?>



 
    <!-- 送信対象の表 -->
    <form action="reservation_accept.php?attraction=<?= $attraction?>" method="post">
        <table id="attr_select">
            <tr>
                <th>時間</th>
                <td><?= $playtime ?></td>
                <input type="hidden" name="playtime" value="<?= $playtime ?>">
            </tr>

            <tr>
                <th>大人</th>
                <td id="select-wrap"><?= $adult_count ?>人</td>
                <input type="hidden" name="adult_count" value="<?= $adult_count ?>">
            </tr>
            <tr>
                <th>子供</th>
                <td id="select-wrap"><?= $child_count ?>人</td>
                <input type="hidden" name="child_count" value="<?= $child_count ?>">
            </tr>
            <tr>
                <th>合計（人）</th>
                <td id="select-wrap"><?= $total ?>人</td>
            </tr>
            
            <tr> <!-- 決定 -->
                <td colspan="2" id="text-center">
                    <input type="submit" value="決定" name="accept">
                </td>
            </tr>
        </table>
    </form>

    <footer>
  <div id="footer_nav">
  <ul>
    <!-- アトラクションのところに行く -->
    <li><a href="pass_list.php">アトラクション</a></li>
    <?php //ログイン後は表示されないように処理
if (!(isset($_SESSION['customer']))) {
?>
<li><a href="login.php">ログイン</a></li>
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