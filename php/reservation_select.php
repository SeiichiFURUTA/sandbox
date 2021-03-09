<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間・人数の選択</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- 画像 -->
    <img src="" alt="">
    <!-- アトラクション名 -->
    <h2>アトラクション名</h2>
    <!-- 送信対象の表 -->
    <form action="reservation_check.php" method="post">
        <table border="1">
            <tr> <!-- 予約時間 -->
                <td>時間</td>
                <td><input type="time" name="playtime"></td>
            </tr>
            
            <tr> <!-- 大人の人数 -->
                <td>大人</td>
                <td>
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
                <td>
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
                    人
                </td>
            </tr>
            <tr> <!-- 決定 -->
                <td colspan="2">
                    <input type="submit" value="決定" name="postSelection">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>