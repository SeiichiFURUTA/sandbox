<?php
$reserv_id = 0;
$time = "";
$adult_count = 0;
$child_count = 0;

if (isset($_POST["accept"])){
    $reserv_id = $_POST["reservation_id"];
    $time = $_POST["time"];
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
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- ここにGDを挿入 -->
    予約が完了しました。
    <br>
    <br>
    <p>
        INSERT INTO reservation_history<br>
        VALUES(<?= $reserv_id ?>, <?= $time ?>, <?= $adult_count ?>, <?= $child_count ?>)
    </p>
</body>
</html>