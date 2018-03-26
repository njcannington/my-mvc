<?php
require "../autoload.php";

use Lib\Bootstrap\Bootstrap;

if (!isset($_GET["q"])) {
    $uri = 'index';
} else {
    $uri = $_GET["q"];
}

$bootstrap = new Bootstrap($uri);
$action = $bootstrap->request->action."Action";
$data = $bootstrap->controller->$action();


require_once(VIEWS."/layout.html");
