<?php
/**
 * 路由基础类
 *
 *
 */

namespace Fast\Main;


class Router
{
    private static $request = [];

    private function __construct()
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