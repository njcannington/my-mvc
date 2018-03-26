<?php
namespace Lib\Bootstrap;

use Lib\Requests\Request;
use Lib\Controllers\ControllerManager;

class Bootstrap
{
    private $request;
    private $controller;
    private $config;

    public function __construct($request)
    {
        $this->request = new Request($request);
        $this->controller = ControllerManager::getController($this->request);
        $action = $this->request->getAction()."Action";
        if (!$this->controller || !method_exists($this->controller, $action)) {
            $this->redirectError();
        }
    }

    public function __get($property)
    {
        $method = "get".ucfirst($property);
        return $this->$method();
    }

    public function redirectError()
    {
        $this->request->setError();
        $this->controller = ControllerManager::getController($this->request);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
