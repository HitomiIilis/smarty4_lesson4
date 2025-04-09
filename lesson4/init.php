<?php

require_once 'libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');

// カスタム修飾子を登録
$smarty->registerPlugin('modifier', 'json_encode', 'json_encode');

?>