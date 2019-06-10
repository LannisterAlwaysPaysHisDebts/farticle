<?php
/**
 * 配置文件使用
 *
 *
 */

namespace Fast\Main;


class Config
{
    protected static $config = [];

    private function __construct()
    {
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (($object = Register::getSys(__CLASS__)) === false) {
            $object = new self();
            Register::setSys(__CLASS__, $object);
        }

        return $object;
    }

    public function load($file)
    {
        if (!file_exists($file)) {
            // todo: exception
            echo "载入配置文件失败";
            exit();
        }

        $contents = include_once $file;
        if (!is_array($contents)) {
            echo "配置文件配置错误";
            exit();
        }
        if (empty($contents)) {
            echo "配置文件为空";
            exit();
        }

        self::$config = array_merge(self::$config, $contents);
    }

    public static function g($config)
    {
        if (!isset(self::$config[$config])) {
            exit();
        }

        return self::$config[$config];
    }
}