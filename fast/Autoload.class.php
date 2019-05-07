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
    protected static $classMap = [];

    protected function __construct()
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
        /**
         * namespace的命名规则:
         *
         * 1.首字母大写
         *
         */

        var_dump($class);


//        spl_autoload_register(function ($class) {
//            static $class_map = [];
//            $class = strtr($class, '\\', DIRECTORY_SEPARATOR);
//            if (!isset($class_map[$class])) {
//                $class_file = ROOT . $class . '.class.php';
//                if (is_file($class_file)) {
//                    require $class_file;
//                }
//                // 无论成功失败, 自动加载只进行一次
//                $class_map[$class] = $class;
//            }
//        });
    }
}