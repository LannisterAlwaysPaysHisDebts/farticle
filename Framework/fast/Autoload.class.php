<?php
/**
 *
 * 自动加载
 *
 */

namespace Fast;


use Fast\Main\Register;

class Autoload
{
    private static $classMap = [];

    private function __construct()
    {
        spl_autoload_register([$this, 'autoload']);
    }

    public static function getInstance()
    {
        if (($autoload = Register::getSys(__CLASS__)) === false) {
            $autoload = new self();
            Register::setSys(__CLASS__, $autoload);
        }

        return $autoload;
    }

    public function autoload($class)
    {
        // todo: 更灵活的配置
        if (!isset(self::$classMap[$class])) {
            $class = strtr($class, '\\', DIRECTORY_SEPARATOR);

            // class.php
            $classPath = ROOT . $class . '.class.php';
            if (is_file($classPath)) {
                require $classPath;
            } else {
                $classPath = ROOT . $class . '.php';
                if (is_file($classPath)) {
                    require $classPath;
                }
            }
            self::$classMap[$class];
        }
    }
}