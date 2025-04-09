<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿詳細</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="post">
    <h2>{$post.title}</h2>
    <p>{$post.content}</p>
    <p>投稿者: {$post.author}</p>
    <p>投稿日時: {$post.created_at}</p>
    <a href="edit.php?id={$post.id}">編集</a>
    <a href="index.php">ホーム画面へ戻る</a>
</div>
</body>
</html>