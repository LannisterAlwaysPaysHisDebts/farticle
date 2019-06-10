<?php
/**
 *
 *
 *
 */

namespace Fast\Admin;

use Fast\Main\Config;
use Fast\Main\Container;
use Fast\Main\Register;

class AdminContainer extends Container
{
    public function run()
    {
        $router = Register::getSys('Router');
        $obj = new $router->obj();
        $func = $router->objFunc();
        $obj->$func;
    }

    public function loadConfig()
    {
        $configPath = CONFIG . 'admin.cfg.php';
        $config = Config::getInstance();
        $config->load($configPath);
    }
}