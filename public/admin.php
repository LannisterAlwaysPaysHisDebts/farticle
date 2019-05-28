<?php
/**
 * admin入口
 *
 *
 * admin.myfarticle.com
 *
 */

require __DIR__ . '/../fast/Index.class.php';


$container = new \Lib\Fast\AdminContainer();

$app = new \Fast\Index();
$app->run($container);