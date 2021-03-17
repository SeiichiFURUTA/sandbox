<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスポート一覧</title>
    <link rel="stylesheet" href="../css/toppage.css">
    <link rel="stylesheet" href="../css/style.css">
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
<h1>アトラクション予約</h1>
<p id="text-left">アトラクションのの予約画面です。<br>
予約したいアトラクションを選び予約ボタンを押してください。<br><br>
なお、アトラクション予約について、特定の予約数の上限に達した場合は予約を停止します。
</p>
    <table id="attr">
     <tr>
      <td>
        <!-- アトラクション詳細テーブル　#attr_detail -->
        <table id="attr_detail">
            <form action="reservation_select.php?attraction=0" method="post">
            <tr>
                <td><img src="../images/roller_coaster.png" alt="roller_coaster"></td>
            </tr>
            <tr>
                <td>
                    <h2>ジェットコースター</h2><br>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="予約する"></td>
            </tr>
            </form>
        </table>
      </td>
     </tr>

     <tr>
      <td>
        <!-- アトラクション詳細テーブル　#attr_detail -->
        <table id="attr_detail">
            <form action="reservation_select.php?attraction=1" method="post">
            <tr>
                <td><img src="../images/ferris_wheel.png" alt="ferris_wheel" ></td>
            </tr>
            <tr>
                <td>
                    <h2 >観覧車</h2><br>
                   
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="予約する"></td>
            </tr>
            </form>
        </table>
      </td>
     </tr>
     <tr>
      <td>
        <!-- アトラクション詳細テーブル　#attr_detail -->
        <table id="attr_detail">
            <form action="reservation_select.php?attraction=2" method="post">
            <tr>
                <td><img src="../images/go_cart.png" alt="go_cart" ></td>
            </tr>
            <tr>
                <td>
                    <h2>ゴーカート</h2><br>
                   
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="予約する"></td>
            </tr>
            </form>
        </table>
      </td>
     </tr>
     <tr>
      <td>
        <!-- アトラクション詳細テーブル　#attr_detail -->
        <table id="attr_detail">
            <form action="reservation_select.php?attraction=3" method="post">
            <tr>
                <td><img src="../images/merry_go_round.png" alt="merry_go_round"></td>
            </tr>
            <tr>
                <td>
                    <h2>メリーゴーランド</h2><br>
                   
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="予約する"></td>
            </tr>
            </form>
        </table>
      </td>
     </tr>
    </table>

    <footer>
  <div id="footer_nav">
  <ul>
    <!-- アトラクションのところに行く -->
    <li><a href="pass_list.php">アトラクション</a></li>
    <?php //ログイン後は表示されないように処理
if (!(isset($_SESSION['customer']))) {
?>
<li><a href="index_login.php">ログイン</a></li>
<?php
}
?>

<?php //ログイン前は表示されないように処理
if (isset($_SESSION['customer'])) {
?>
  <li><a href="index_sign.php">ログアウト</a></li>
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