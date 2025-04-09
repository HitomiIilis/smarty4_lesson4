<?php
require 'init.php';
require 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die('指定された投稿は存在しません。');
}

$smarty->assign('post', $post);
$smarty->display('detail.tpl');
?>