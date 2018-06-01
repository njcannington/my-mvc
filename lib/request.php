<?php
namespace Lib;

/**
 * class that holds data / view logic based on
 *  correspond route / uri
 */

class Request
{
    protected $data;
    protected $view;
    protected $insance;

    public function __construct($route)
    {
        $controller = $route->getController();
        $action = $route->getAction();

        $this->instance = new $controller();
        $this->data = $this->instance->$action();
        $this->view = $this->instance->getView();
    }

    /*
    ***************************************
    *      METHODS TO OBTAIN PROPERTIES
    ***************************************
    */

    public function getData()
    {
        return $this->data;
    }

    public function getView()
    {
        return $this->view;
    }

    public function getInstance()
    {
        return $this->instance;
    }
}
