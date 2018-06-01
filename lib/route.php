<?php
namespace Lib;

/**
* class assocaited with routing uri to controller / action
*/
class Route
{
    protected $available_routes = [];
    protected $uri;
    protected $controller;
    protected $action;

    public function __construct($uri)
    {
        $this->uri = "/".$uri;
    }

    /*
    ***************************************
    *           PUBLIC METHODS
    ***************************************
    */

    /*
    * sets up uri to controller/action relationship
    */
    public function add($uri, $controller, $action)
    {
        $this->available_routes[] =
        ["uri" => $uri,
        "controller" => "App\Controllers\\".ucfirst($controller)."Controller",
        "action" => strtolower($action)."Action"];
    }

    /*
    * traverses through the available routes property to
    *  return corresponding route based associated
    *  with the given $uri
    */
    public function set()
    {
        foreach ($this->available_routes as $route) {
            if ($route["uri"] == $this->uri) {
                $this->controller = $route["controller"];
                $this->action = $route["action"];
            }
        }
        if ($this->controller == null) {
            $this->setError();
        }
    }

    /*
    ***************************************
    *           PROTECTED METHODS
    ***************************************
    */

    /*
    * sets controller and action to error page
    */
    protected function setError()
    {
        $this->controller = "App\Controllers\\ErrorController";
        $this->action = "indexAction";
    }

    /*
    ***************************************
    *      METHODS TO OBTAIN PROPERTIES
    ***************************************
    */

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getView()
    {
        return $this->view;
    }

}
