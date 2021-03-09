<?php
$attr_name = "";
$playtime = "";
$adult_count = 0;
$child_count = 0;

if (isset($_POST["postSelection"])){
    $attr_name = "不明";
    $playtime = $_POST["playtime"];
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
    <title>予約確認</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="reservation_accept.php" method="post">
        <table border="1"> <!-- アトラクション名・時間 -->
            <tr>
                <th>アトラクション</th>
                <td><?= $attr_name ?></td>
                <input type="hidden" name="reservation_id" value="0">
            </tr>
            <tr>
                <th>時間</th>
                <td><?= $playtime ?></td>
                <input type="hidden" name="time" value="<?= $playtime ?>">
            </tr>
        </table>

        <table border="1"> <!-- 大人・子供の人数 -->
            <tr>
                <td></td>
                <th>人数（人）</th>
            </tr>
            <tr>
                <th>大人</th>
                <td><?= $adult_count ?></td>
                <input type="hidden" name="adult_count" value="<?= $adult_count ?>">
            </tr>
            <tr>
                <th>子供</th>
                <td><?= $child_count ?></td>
                <input type="hidden" name="child_count" value="<?= $child_count ?>">
            </tr>
            <tr>
                <th>合計（人）</th>
                <td><?= $total ?></td>
            </tr>
        </table>
        <input type="submit" value="決定" name="accept">
        <input type="button" value="変更する" name="accept">
    </form>
</body>
</html>