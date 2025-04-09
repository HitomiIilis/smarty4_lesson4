<?php
/* Smarty version 4.3.0, created on 2025-04-07 04:36:40
  from '/Applications/MAMP/htdocs/smarty4/lesson4/templates/detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_67f35658cb4c41_60972991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bb8cbb335b80bb7bafdf9d7b55a5e30e472e659' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty4/lesson4/templates/detail.tpl',
      1 => 1744000597,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f35658cb4c41_60972991 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
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
    <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
    <p><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
</p>
    <p>投稿者: <?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
</p>
    <p>投稿日時: <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>
</p>
    <a href="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">編集</a>
    <a href="index.php">ホーム画面へ戻る</a>
</div>
</body>
</html><?php }
}
