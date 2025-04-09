<?php
/* Smarty version 4.3.0, created on 2025-04-07 05:26:18
  from '/Applications/MAMP/htdocs/smarty4/lesson4/search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_67f361fa01c623_78784205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04cef4bae23c1a32d47377842795e027c088b130' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty4/lesson4/search.tpl',
      1 => 1744003572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f361fa01c623_78784205 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/smarty4/lesson4/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
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
    <input type="text" name="search" id="search" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['search']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="検索キーワード">
    <div>
        <label for="start_date">開始日：</label>
        <input type="date" name="start_date" id="start_date" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['start_date']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
    </div>
    <div>
        <label for="end_date">終了日：</label>
        <input type="date" name="end_date" id="end_date" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['end_date']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
    </div>
    <select name="sort" id="sort">
        <option value="created_at DESC" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'created_at DESC') {?>selected<?php }?>>投稿日時（新しい順）</option>
        <option value="created_at ASC" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'created_at ASC') {?>selected<?php }?>>投稿日時（古い順）</option>
        <option value="posted_time DESC" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'posted_time DESC') {?>selected<?php }?>>投稿時間（新しい順）</option>
        <option value="posted_time ASC" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'posted_time ASC') {?>selected<?php }?>>投稿時間（古い順）</option>
    </select>
    <button type="submit">検索</button>
    <button type="button" id="reset-button">リセット</button>
</form>

<a href="index.php">ホーム画面へ戻る</a>

<?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
    <div class="post">
        <h2><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <p><?php echo htmlspecialchars((string)smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['content'],10), ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p>投稿者: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['author'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p>投稿日: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['created_at'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <!-- <p>投稿時間: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['posted_time'], ENT_QUOTES, 'UTF-8', true);?>
</p> -->
        <a href="detail.php?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">続きを読む</a>
        <a href="edit.php?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">編集</a>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
    <p>検索結果が見つかりませんでした。</p>
<?php }?>

<a href="index.php">ホーム画面へ戻る</a>

<?php echo '<script'; ?>
>
document.getElementById('reset-button').addEventListener('click', function() {
    document.getElementById('search-form').reset();
    document.getElementById('search').value = '';
    document.getElementById('start_date').value = '';
    document.getElementById('end_date').value = '';
    document.getElementById('sort').selectedIndex = 0;
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
