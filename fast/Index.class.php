<?php
/**
 * 核心入口
 *
 *
 */

namespace Fast;

class Index
{
    public function __construct()
    {
    }

    public function run()
    {
        $this->baseConfig();
        $this->autoload();


    }

    protected function baseConfig()
    {
        require __DIR__ . '/Autoload.class.php';
        require __DIR__ . '/main/Register.class.php';

        define('FAST', __DIR__ . '/');
        define('CONFIG', __DIR__ . '/../config');
    }

    protected function autoload()
    {
        $autoload = Autoload::getInstance();
    }
}