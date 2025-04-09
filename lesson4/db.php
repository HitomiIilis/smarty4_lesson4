<?php
// データベース接続情報
$host = 'localhost';  // サーバー名（変更が必要な場合あり）
$port = '8889'; // MAMPのMySQLデフォルトポート
$dbname = 'keijiban_db'; // データベース名
$username = 'root';    // ユーザー名（環境に合わせて変更）
$password = 'root';        // パスワード（設定している場合は変更）

try {
    // PDOを使ってデータベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;port=", $username, $password);
    
    // エラーモードを例外に設定（エラー時に詳細なメッセージを表示）
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "データベース接続成功！";
    echo "<h2>&#9827;掲示板へようこそ&#9827;</h2>";

    // フェッチモードを連想配列に設定
   // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // エラー発生時にメッセージを表示して終了
    die("データベース接続エラー: " . $e->getMessage());
}
?>
