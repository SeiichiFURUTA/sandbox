<?php session_start(); ?>
<?php
$attraction = $_GET["attraction"];
$playtime = "";
$adult_count = 0;
$child_count = 0;
$total_people=0;
$atraction_people=[20,30,15,10];
$total=0;
date_default_timezone_set('Asia/Tokyo');
$today = new Datetime(date("H:i",strtotime("+10 min")));
$limit_time = new Datetime(date("H:i",strtotime($time)));

if (isset($_POST["accept"])){
    $playtime = $_POST["playtime"];
    $adult_count = $_POST["adult_count"];
    $child_count = $_POST["child_count"];
}

//※$timeはstring型
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約完了</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/toppage.css">
</head>
<body>

<header>
<nav id ="global_navi">
  <ul>
    <li><a href="pass_list.php">アトラクション</a></li>   
    <li><?php require_once("loginbutton.php"); ?></li>
<li><a href="reserved_check.php">予約確認画面</a></li>
  </ul>
</nav>
</header>

<ul class="stepbar">
	<li class="stepbar__item"><div class="stepbar__item-inner">選択</div></li>
	<li class="stepbar__item"><div class="stepbar__item-inner">確認</div></li>
	<li class="stepbar__item"><div class="stepbar__item-inner　stepbar__item-inner--current">完了</div></li>
</ul>
<?php
        require "db_connect.php";
        foreach($results as $r){
          $sql = "select *
                  from pass_history 
                  where atraction_id = :atraction_id and customer_id = :customer_id and times = :times";
          $sql2 = "select atraction_id , adult_count , child_count
                  from pass_history 
                  where atraction_id = :atraction_id";
          $stm = $pdo->prepare($sql);
          $stm2= $pdo->prepare($sql2);
          $stm2->bindValue(':atraction_id',$r['atraction_id'],PDO::PARAM_INT);
          $stm->execute();
          $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
  
          foreach($result2 as $r2){
              $total_people = $r2['adult_count']+$r2['child_count']+$total_people;
            echo $r2['adult_count'];
          }
        }
            echo $total_people;
        
        
        if(!isset($_SESSION['customer'])){
          ?><h3 id="attr-select-box-h3">ログインして下さい。</h3><?php
        }
        // else if(0==$adult_count+$child_count){
        //   echo "不明な人数です。";
        // }
        // else if($total_people+$adult_count+$child_count>$atraction_people[$atraction_id]){
        //     echo "予約が満席です。";
        // }
        // else if($time_count>0){
        //     echo "同時刻に予約を入れています。";
        // }
        else if($today>$limit_time){
            echo "不明な時刻です";
        }
        else{
        $sql = "INSERT INTO pass_history VALUES(:atraction_id, :customer_id, :adult_count, :child_count, :times)";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(":atraction_id",$attraction,PDO::PARAM_INT);
        $stm->bindValue(":customer_id",$_SESSION['customer']['id'],PDO::PARAM_INT);
        $stm->bindValue(":adult_count",$adult_count,PDO::PARAM_INT);
        $stm->bindValue(":child_count",$child_count,PDO::PARAM_INT);
        $stm->bindValue(":times",$playtime,PDO::PARAM_STR);
        $stm->execute();
        ?><h3 id="attr-select-box-h3">予約が完了しました。</h3><?php
        }
        
	?>
    <!-- ここにGDを挿入 -->
    <br>
       <h3><a href="index.php" id="button">トップページ</a>
      </h3>
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
