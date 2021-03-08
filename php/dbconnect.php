<?php 
//DBにコネクト
    require_once './env.php';
    function connect(){
        $host = DB_HOST;
        $db = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;

        $dsn = "mysql:host = $host; dbname = $db; charset = tf8mb4";

        try{
            $pdo = new PDO($dsn, $user, $pass, [
                //エラーモードを決める
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //フェッチモード、配列をkeyとvalueで必ず返す
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            echo '成功です！';
        }catch(PDOException $e){
            echo '接続失敗です！'.$e->getMessage();
            exit();
        }
    }

    echo connect();
 ?>