<?php
require 'init.php';
require 'db.php';

$errors = [];
$title = '';
$content = '';
$author = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    $author = isset($_POST['author']) ? trim($_POST['author']) : '';
    $datetime = isset($_POST['datetime']) ? trim($_POST['datetime']) : '';

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
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, author, created_at, posted_time) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $content, $author, $datetime, $datetime]);
        header('Location: index.php');
        exit;
    }
}

$smarty->assign('errors', $errors);
$smarty->assign('title', $title);
$smarty->assign('content', $content);
$smarty->assign('author', $author);
$smarty->display('form.tpl');
?>