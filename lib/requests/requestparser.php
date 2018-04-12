<?php
namespace Lib\Requests;

class RequestParser
{
    private $request;
    private $pieces;

    public function __construct($request)
    {
        $this->request = $request;
        $this->toArray();
        $this->removeEmptyElements();
        $this->extractPieces();
    }

    private function toArray()
    {
        $this->request = explode("/", $this->request);
    }

    private function removeEmptyElements()
    {
        $this->request = array_filter($this->request);
    }

    private function extractPieces()
    {
        switch (count($this->request)) {
            case '1':
                $this->pieces = $this->extractFromOneElement();
                break;
            case '2':
                $this->pieces = $this->extractFromTwoElements();
                break;
            default:
                $this->pieces = $this->extractFromManyElements();
                break;
        }
    }

    private function extractFromOneElement()
    {
        $path = "/";
        $namespace = "\\";
        $controller = "Index";


        if (current($this->request) == "index") {
            $view = "/index.html";
            $action = "Index";
        } else {
            $view = "/".current($this->request).".html";
            $action = current($this->request);
        }

        return compact("path", "controller", "action", "namespace", "view");
    }

    private function extractFromTwoElements()
    {
        $path = "/".current($this->request)."/";
        $controller = "Index";
        $action = next($this->request);
        $namespace = str_replace("/", "\\", $path);
        $view = strtolower($path.$action.".html");

        return compact("path", "controller", "action", "namespace", "view");
    }

    private function extractFromManyElements()
    {
        $action = ucfirst(end($this->request));
        $controller = ucfirst(prev($this->request));
        $path = null;
        $namespace = null;
        while (!is_null(key($this->request))) {
            $path_as_array[] = ucfirst(prev($this->request));
        }
        foreach (array_reverse($path_as_array) as $path_segment) {
            $path .= $path_segment."/";
            $namespace .= $path_segment."\\";
        }
        $view = strtolower($path.$action.".html");

        return compact("path", "controller", "action", "namespace", "view");
    }

    public function getPieces()
    {
        return $this->pieces;
    }
}
