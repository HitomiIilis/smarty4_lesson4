<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>検索結果</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>検索結果</h2>

<form id="search-form" action="search.php" method="get">
    <input type="text" name="search" id="search" value="{$search|escape}" placeholder="検索キーワード">
    <div>
        <label for="start_date">開始日：</label>
        <input type="date" name="start_date" id="start_date" value="{$start_date|escape}" />
    </div>
    <div>
        <label for="end_date">終了日：</label>
        <input type="date" name="end_date" id="end_date" value="{$end_date|escape}" />
    </div>
    <select name="sort" id="sort">
        <option value="created_at DESC" {if $sort == 'created_at DESC'}selected{/if}>投稿日時（新しい順）</option>
        <option value="created_at ASC" {if $sort == 'created_at ASC'}selected{/if}>投稿日時（古い順）</option>
        <option value="posted_time DESC" {if $sort == 'posted_time DESC'}selected{/if}>投稿時間（新しい順）</option>
        <option value="posted_time ASC" {if $sort == 'posted_time ASC'}selected{/if}>投稿時間（古い順）</option>
    </select>
    <button type="submit">検索</button>
    <button type="button" id="reset-button">リセット</button>
</form>

<a href="index.php">ホーム画面へ戻る</a>

{if $posts}
    {foreach from=$posts item=post}
    <div class="post">
        <h2>{$post.title|escape}</h2>
        <p>{$post.content|truncate:10|escape}</p>
        <p>投稿者: {$post.author|escape}</p>
        <p>投稿日: {$post.created_at|escape}</p>
        <!-- <p>投稿時間: {$post.posted_time|escape}</p> -->
        <a href="detail.php?id={$post.id|escape}">続きを読む</a>
        <a href="edit.php?id={$post.id|escape}">編集</a>
    </div>
    {/foreach}
{else}
    <p>検索結果が見つかりませんでした。</p>
{/if}

<a href="index.php">ホーム画面へ戻る</a>

<script>
document.getElementById('reset-button').addEventListener('click', function() {
    document.getElementById('search-form').reset();
    document.getElementById('search').value = '';
    document.getElementById('start_date').value = '';
    document.getElementById('end_date').value = '';
    document.getElementById('sort').selectedIndex = 0;
});
</script>
</body>
</html>