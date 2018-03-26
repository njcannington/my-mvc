<?php
namespace Lib\Controllers;

class ControllerManager
{

    public static function getController(\Lib\Requests\Request $request)
    {
        $path = strtolower($request->getPath());
        $controller_name = $request->getControllerName();
        $namespace = "App\Controllers".$request->getNamespace();

        if (file_exists(CONTROLLERS.$path.strtolower($controller_name)."controller.php")) {
            $class = $namespace.$controller_name."controller";
            if (class_exists($class)) {
                return new $class();
            }
        } else {
            return false;
        }
    }
}
