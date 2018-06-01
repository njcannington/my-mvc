<?php
namespace Lib;

/**
 * base class for all controllers
 */

class Controller
{
    protected $view;

    /*
    ***************************************
    *           PROTECTED METHODS
    ***************************************
    */

    /*
    * sets the view to be used for specific actions
    */
    protected function setView($view)
    {
        $this->view = VIEWS."/".$view.".html";
    }

    /*
    * redircts url based on provided uri
    */
    protected function redirect($uri)
    {
        header('Location: '.$uri);
        die();
    }


    /*
    ***************************************
    *      METHODS TO OBTAIN PROPERTIES
    ***************************************
    */

    public function getView()
    {
        return $this->view;
    }
}
