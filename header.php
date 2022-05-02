<?php
require_once('smarty-4.1.0/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty -> template_dir = 'views';
$smarty -> compile_dir = 'tmp';