<?php session_start(); ?>
<?php
$attraction = $_GET['attraction'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間・人数の選択</title>
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
	<li class="stepbar__item"><div class="stepbar__item-inner stepbar__item-inner--current">選択</div></li>
	<li class="stepbar__item"><div class="stepbar__item-inner">確認</div></li>
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
    <form action="reservation_check.php?attraction=<?= $attraction?>" method="post">
        <table id="attr_select">
        <tr> <!-- 予約時間 -->
                <td>時間</td>
                <td>
                    <select name="hour_time">
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                    時
                    <select name="minutes_time">
                        <option value="00">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    分
                </td>
            </tr>
            
            <tr> <!-- 大人の人数 -->
                <td>大人</td>
                <td id="select-wrap">
                    <select name="adult_count">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                    人
                </td>
            </tr>
            <tr> <!-- 子供の人数 -->
                <td>子供</td>
                <td id="select-wrap">
                    <select name="child_count">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                    人<br>
                </td>
            </tr>
            <tr> <!-- 決定 -->
                <td colspan="2" id="text-center">
                    <input type="submit" value="決定" name="postSelection">
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