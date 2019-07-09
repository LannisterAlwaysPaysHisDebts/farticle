<?php
/**
 * cli入口
 *
 *
 */


if (PHP_SAPI != 'cli') {
    exit('error mode!');
}

require __DIR__ . '/../fast/Index.class.php';

$cli = new \Fast\Index();

require __DIR__ . '/../lib/fast/CliContainer.class.php';
$container = new \Lib\Fast\CliContainer();
$cli->run($container);