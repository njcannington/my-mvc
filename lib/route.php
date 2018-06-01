<?php
namespace Lib;

/**
 * a class to return the action method from the proper controller
 */

class Route
{
    protected $routes = [];

    /*
    ***************************************
    *           PUBLIC METHODS
    ***************************************
    */

    /*
    * method for settingup uri to controller relationship
    */
    public function add($uri, $controller, $action)
    {
        $this->routes[] =
        ["uri" => $uri,
        "controller" => ucfirst($controller)."Controller",
        "action" => strtolower($action)."Action"];
    }

    /*
    * returns the corresponding controller/action based on uri
    * if no controller found, returns ErrorController
    */
    public function get($uri)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] == "/".$uri) {
                $class = "App\Controllers\\".$route["controller"];
                $controller = new $class();
                $action = $route["action"];
                return $controller->$action();
            }
        }
        $controller =  new \App\Controllers\ErrorController();
        return $controller->indexAction();
    }

    /*
    ***************************************
    *         PROTECTED METHODS
    ***************************************
    */
    protected function getController($uri)
    {
    }
}
