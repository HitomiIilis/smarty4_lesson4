<?php
require 'init.php';
require 'db.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : 'created_at DESC';
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// ベースクエリ
$query = "SELECT * FROM posts WHERE (title LIKE ? OR content LIKE ? OR author LIKE ?)";
$params = ["%$search%", "%$search%", "%$search%"];

// 開始日でフィルタリング
if ($start_date !== '') {
    $query .= " AND created_at >= ?";
    $params[] = $start_date . ' 00:00:00';
}

// 終了日でフィルタリング
if ($end_date !== '') {
    $query .= " AND created_at <= ?";
    $params[] = $end_date . ' 23:59:59';
}

// ソート順を追加
$query .= " ORDER BY $sort";

// クエリを実行
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign('posts', $posts);
$smarty->assign('search', $search);
$smarty->assign('sort', $sort);
$smarty->assign('start_date', $start_date);
$smarty->assign('end_date', $end_date);
$smarty->display('search.tpl');
?>