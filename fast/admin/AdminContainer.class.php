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

    }

    public function loadConfig()
    {
        $configPath = CONFIG . 'admin.cfg.php';
        $config = Config::getInstance();
        $config->load($configPath);
    }
}