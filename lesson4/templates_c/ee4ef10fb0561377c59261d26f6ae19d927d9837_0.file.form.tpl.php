<?php
/* Smarty version 4.3.0, created on 2025-04-07 06:45:05
  from '/Applications/MAMP/htdocs/smarty4/lesson4/templates/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_67f374713c2281_94854506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee4ef10fb0561377c59261d26f6ae19d927d9837' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty4/lesson4/templates/form.tpl',
      1 => 1744008291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f374713c2281_94854506 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新規投稿</title>
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
<h2>新規投稿</h2>

<div id="error-messages" style="color: red;"></div>

<form action="form.php" method="post">
    <div>
        <label for="title">タイトル：</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
    </div>
    <div>
        <label for="content">内容：</label>
        <textarea name="content" id="content"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['content']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>
    <div>
        <label for="author">投稿者名：</label>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['author']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
    </div>
    <div>
        <label for="datetime">投稿日時：</label>
        <input type="text" name="datetime" id="datetime" readonly />
    </div>
    <div>
        <button type="submit">投稿</button>
    </div>
</form>

<a href="index.php">ホーム画面へ戻る</a>

<!-- モーダルウィンドウのHTML -->
<div id="errorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modal-error-messages"></p>
    </div>
</div>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    var errors = JSON.parse('<?php echo strtr((string)call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['errors']->value )), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
');
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

    function updateDateTime() {
        var now = new Date();
        var formattedDate = now.getFullYear() + '-' +
                            ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
                            ('0' + now.getDate()).slice(-2) + ' ' +
                            ('0' + now.getHours()).slice(-2) + ':' +
                            ('0' + now.getMinutes()).slice(-2) + ':' +
                            ('0' + now.getSeconds()).slice(-2);
        document.getElementById('datetime').value = formattedDate;
    }

    // 初期表示
    updateDateTime();
    // 1秒ごとに日時を更新
    setInterval(updateDateTime, 1000);
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
