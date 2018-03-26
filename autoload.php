<?php

const ROOT = __DIR__;
const VIEWS = ROOT."/app/views";
const CONTROLLERS = ROOT."/app/controllers";
const MODELS = ROOT."/app/models";

$autoload = function ($class) {
    $path = str_replace("\\", "/", $class);
    $file = ROOT."/".strtolower($path).".php";
    if (file_exists($file)) {
        require_once($file);
    }
};

spl_autoload_register($autoload);
