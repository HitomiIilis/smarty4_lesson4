<?php
require 'init.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
} else {
    die("不正なリクエストです。");
}
?>