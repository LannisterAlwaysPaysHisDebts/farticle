<?php
/**
 * 配置文件使用
 *
 *
 */

namespace Fast\Main;


class Config
{
    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (($object = Register::getSys(__CLASS__)) === false) {
            $object = new self();
            Register::setSys(__CLASS__, $object);
        }

        return $object;
    }
}