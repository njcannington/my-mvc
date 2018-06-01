<?php
namespace App\Controllers;

use Lib\Controller;

class ErrorController extends Controller
{
    public function indexAction()
    {
        $this->setView("error");
        $text = "Error";

        return compact("text");
    }
}
