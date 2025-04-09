<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>掲示板ホーム</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- <h5>&#9831;このページでは、今まで編集した履歴が見れます&#9831;</h5> -->
<h4>新しく掲示板をを作成したい方はこちらへ&rarr;<a href="form.php">ココ</a></h4>
<h4>検索結果を検索したい方はこちらへ&rarr;<a href="search.php">ココ</a></h4>
{foreach from=$posts item=post}
    <div class="post">
        <h2>{$post.title}</h2>
        <p>{$post.content|truncate:10}</p>
        <a href="detail.php?id={$post.id}">続きを読む</a>
        <a href="edit.php?id={$post.id}">編集</a>
        
    </div>
{/foreach}

</body>
</html>