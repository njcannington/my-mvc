<?php
require "../autoload.php";

use Lib\Route;

$route = new Route();
/*
* add any new routes below
*/
//////////////////////////
$route->add("/", "index", "index");


//////////////////////////
$uri = $_GET["uri"] ?? '';
$route->get($uri);


require_once(VIEWS."/layout.html");
