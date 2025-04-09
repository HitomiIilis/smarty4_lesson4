<?php
/* Smarty version 4.3.0, created on 2025-04-07 04:10:48
  from '/Applications/MAMP/htdocs/smarty4/lesson4/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_67f350489a1140_85945307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56ef843a23f9fd387c9e1c24e76271e8aa16bcc9' => 
    array (
      0 => '/Applications/MAMP/htdocs/smarty4/lesson4/templates/index.tpl',
      1 => 1743999044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f350489a1140_85945307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/smarty4/lesson4/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
    <div class="post">
        <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
        <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['content'],10);?>
</p>
        <a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">続きを読む</a>
        <a href="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">編集</a>
        
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</body>
</html><?php }
}
