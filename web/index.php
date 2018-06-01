<?php
require "../autoload.php";

use Lib\Route;
use Lib\Request;

$uri = $_GET["uri"] ?? '';

/*
* add any new routes below using add($uri, $controller, $action, $view)
*/
//////////////////////////
$route = new Route($uri);
$route->add("/", "index", "index");

$route->set();
//////////////////////////

$request = new Request($route);
$data = $request->getData();

require_once(VIEWS."/layout.html");
