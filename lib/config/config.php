<?php
namespace Lib\Config;

class Config
{
    private static $instance = null;

    //empty private construct to prevent new object istance;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $config = ROOT."/config/app.ini";
            self::$instance = parse_ini_file($config, true);
        }
        return self::$instance;
    }
}
