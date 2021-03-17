<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約確認画面</title>
</head>
<body>
    <!-- ここにヘッダー -->
    <h1>予約確認</h1>
    <?php
    $customer_id = 0; //顧客テーブルの完成次第、代入する。

    require_once('db_connect.php');

    $pdo->exec("create table if not exists pass_history(
        atraction_id int(11) not null, 
        customer_id int(11), adult_count int(11), 
        child_count int(11), times varchar(5), limits int(11))
    ");

    //atraction_idとcustomer_idとtimesで、user_dbのidでforeach文で予約している分ループして表示する。(timesの降順で並び替え)
    $sql = "select * from pass_history where customer_id = :customer_id 
            order by times asc";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':customer_id',$customer_id,PDO::PARAM_STR);
    $stm->execute();
    $results = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $r){
        $sql = "select atraction_id, customer_id, times from pass_history 
                where atraction_id = :atraction_id and customer_id = :customer_id and times = :times";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':atraction_id',$r['atraction_id'],PDO::PARAM_STR);
        $stm->bindValue(':customer_id',$r['customer_id'],PDO::PARAM_STR);
        $stm->bindValue(':times',$r['times'],PDO::PARAM_STR);
        $stm->execute();
        $result2 = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result2 as $r2){
            $attr = $r2['atraction_id'];
            $cust = $r2['customer_id'];
            $time = $r2['times'];
        }
    ?>
    <IMG src="../gd/icon_manager.php?attraction=<?= $attr ?>&time=<?= $time ?>"><br>
    <?php
    }
    ?>
    <!-- ここにフッター -->
</body>
</html>