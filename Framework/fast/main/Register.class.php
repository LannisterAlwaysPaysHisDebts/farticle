<?php
/**
 * 全局注册树
 *
 */

namespace Fast\Main;


class Register
{
    protected static $objects;

    public static function set(string $alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    public static function get(string $name)
    {
        return self::$objects[$name] ?? false;
    }

    protected static $system;

    public static function setSys(string $alias, $object)
    {
        self::$system[$alias] = $object;
    }

    public static function getSys(string $name)
    {
        return self::$system[$name] ?? false;
    }
}