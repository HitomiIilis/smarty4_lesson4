<?php
    require 'init.php';
    require 'db.php';

    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $smarty->assign('posts', $posts);
    $smarty->display('index.tpl');

?>
