<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿編集</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>
<h2>投稿編集</h2>

<div id="error-messages" style="color: red;"></div>

<form action="edit.php?id={$id}" method="post">
    <div>
        <label for="title">タイトル：</label>
        <input type="text" name="title" id="title" value="{$title|escape}" />
    </div>
    <div>
        <label for="content">内容：</label>
        <textarea name="content" id="content" rows="8" cols="50">{$content|escape}</textarea>
    </div>
    <div>
        <label for="author">投稿者名：</label>
        <input type="text" name="author" id="author" value="{$author|escape}" />
    </div>
    <div>
        <p>投稿日時: {$created_at}</p>
        <!-- <p>投稿時間: {$posted_time}</p> -->
    </div>
    <div>
        <p>現在の日時: <span id="current_datetime"></span></p>
    </div>
    <div>
        <button type="submit">更新</button>
    </div>
</form>
<form action="delete.php?id={$id}" method="post" onsubmit="return confirm('本当に削除しますか？');">
    <button type="submit">削除</button>
</form>
<a href="index.php">ホーム画面へ戻る</a>

<!-- モーダルウィンドウのHTML -->
<div id="errorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modal-error-messages"></p>
    </div>
</div>

<script>
function updateDateTime() {
    var now = new Date();
    var year = now.getFullYear();
    var month = String(now.getMonth() + 1).padStart(2, '0');
    var day = String(now.getDate()).padStart(2, '0');
    var hours = String(now.getHours()).padStart(2, '0');
    var minutes = String(now.getMinutes()).padStart(2, '0');
    var seconds = String(now.getSeconds()).padStart(2, '0');
    var currentDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    document.getElementById('current_datetime').textContent = currentDateTime;
}

setInterval(updateDateTime, 1000);
updateDateTime(); // 初回実行のために呼び出し

document.addEventListener('DOMContentLoaded', function() {
    var errors = JSON.parse('{$errors|json_encode|escape:"javascript"}');
    console.log("Parsed errors:", errors); // デバッグ用ログ
    if (errors.length > 0) {
        var errorMessages = errors.join('\n');
        console.log("Error messages:", errorMessages); // デバッグ用ログ
        document.getElementById('modal-error-messages').textContent = errorMessages;
        var modal = document.getElementById("errorModal");
        var span = document.getElementsByClassName("close")[0];
        
        modal.style.display = "block";
        console.log("Modal displayed"); // デバッグ用ログ
        
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
});
</script>
</body>
</html>