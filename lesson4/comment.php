<?php 
require 'init.php';
require 'db.php';

$spostiId = isset($_GET ['id']) ? (int)$_GET['id'] : 0;
$content = isset($_POST['content']) ? $_POST['content'] : '';

if ($postId > 0 && !empty($content)) {
$stmt = $pdo->prepare("INSERT INTO comments (post_id, content) VALUES (:post_id, :content)");
$stmt->execute(['post_id' => $postId, 'content' => $content]);
}

header("Location: detail.php?id=$postId");
exit;
?>