<?php
/**
 * admin入口
 *
 *
 * admin.myfarticle.com
 *
 */

require __DIR__ . '/../fast/Index.class.php';

$app = new \Fast\Index();

require __DIR__ . '/../fast/admin/AdminContainer.class.php';
$container = new \Fast\Admin\AdminContainer();
$app->run($container);