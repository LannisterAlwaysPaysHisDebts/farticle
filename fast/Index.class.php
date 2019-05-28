<?php
/**
 * 核心入口
 *
 *
 */

namespace Fast;

use Fast\Main\Container;
use Fast\Main\Router;

class Index
{
    public function __construct()
    {
        $this->baseConfig();
        $this->autoload();
    }

    /**
     * 入口文件
     *
     * @param Container $container
     */
    public function run(Container $container)
    {
        $this->router();

    }

    /**
     * 全局配置
     */
    private function baseConfig()
    {
        require __DIR__ . '/Autoload.class.php';
        require __DIR__ . '/main/Register.class.php';

        define('FAST', __DIR__ . '/');
        define('CONFIG', __DIR__ . '/../config');
        define('ROOT', dirname(__DIR__) . '/');
    }

    /**
     * 自动加载
     */
    private function autoload()
    {
        Autoload::getInstance();
    }

    /**
     * 解析请求
     */
    private function router()
    {
        Router::getInstance();
    }
}