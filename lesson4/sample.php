<?php

require_once __DIR__ . '/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';

$smarty->default_modifiers = array('escape');


$smarty->assign('test', "テスト。\nこれは<em>テスト</em>です。");


$smarty->display('test.html');

?>