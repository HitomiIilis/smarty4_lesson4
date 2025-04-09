<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>検索フォーム</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>検索フォーム</h2>

<form action="search.php" method="get">
    <div>
        <label for="keyword">キーワード：</label>
        <input type="text" name="keyword" id="keyword" />
    </div>
    <div>
        <label for="start_date">開始日：</label>
        <input type="date" name="start_date" id="start_date" />
    </div>
    <div>
        <label for="end_date">終了日：</label>
        <input type="date" name="end_date" id="end_date" />
    </div>
    <div>
        <button type="submit">検索</button>
    </div>
</form>

<a href="index.php">ホームへ戻る</a>
</body>
</html>