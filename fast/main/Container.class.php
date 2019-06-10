<?php
/**
 * 容器类
 *
 *
 */

namespace Fast\Main;


abstract class Container
{
    public abstract function run();

    public abstract function loadConfig();
}