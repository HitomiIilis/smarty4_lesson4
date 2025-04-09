<?php
require 'init.php';
require 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$errors = [];
$title = '';
$content = '';
$author = '';
$created_at = '';
$posted_time = '';

if ($id === 0) {
    echo '無効な投稿IDです。URLに正しいIDパラメータが含まれていることを確認してください。ID: ' . htmlspecialchars($id);
    exit;
}

// 投稿が存在するか確認
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    // 投稿が存在しない場合の処理
    $errors[] = '指定された投稿は存在しません。';
    $smarty->assign('errors', $errors);
    $smarty->display('edit.tpl');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    $author = isset($_POST['author']) ? trim($_POST['author']) : '';
    $created_at = $post['created_at']; // 既存の投稿日時
    $posted_time = $post['posted_time']; // 既存の投稿時間

    if ($title === '') {
        $errors[] = 'タイトルを入力してください。';
    }
    if ($content === '') {
        $errors[] = '内容を入力してください。';
    }
    if ($author === '') {
        $errors[] = '投稿者名を入力してください。';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ?, author = ? WHERE id = ?");
        if ($stmt->execute([$title, $content, $author, $id])) {
            header('Location: detail.php?id=' . $id);
            exit;
        } else {
            $errors[] = 'データベースの更新に失敗しました。';
        }
    }
} else {
    $title = $post['title'];
    $content = $post['content'];
    $author = $post['author'];
    $created_at = $post['created_at'];
    $posted_time = $post['posted_time'];
}

$smarty->assign('errors', $errors);
$smarty->assign('title', $title);
$smarty->assign('content', $content);
$smarty->assign('author', $author);
$smarty->assign('created_at', $created_at);
$smarty->assign('posted_time', $posted_time);
$smarty->assign('id', $id);
$smarty->display('edit.tpl');
?>