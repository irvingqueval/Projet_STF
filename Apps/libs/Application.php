<?php

namespace Apps\libs;

class Application
{
    public static function run()
    {
        $controllerName = "HomeController";
        $task = "index";

        if (isset($_GET['controller'])) {
            $controllerName = ucfirst($_GET['controller']);
        }

        if (isset($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controllerName = "Apps\Controllers\\" . $controllerName;
        $controller = new $controllerName();
        $controller->$task();
    }
}
