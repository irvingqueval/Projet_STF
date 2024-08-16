<?php

namespace Apps\Libs;

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

        $controllerName = "Apps\\Controllers\\" . $controllerName;
        $controller = new $controllerName();

        // Check if the method exists in the controller
        if (method_exists($controller, $task)) {
            if (isset($_GET['id'])) {
                // Call method with ID if present in URL
                $controller->$task($_GET['id']);
            } else {
                // Call the method without arguments
                $controller->$task();
            }
        } else {
            // Handle error if method does not exist
            echo "La méthode $task n'existe pas dans le contrôleur $controllerName.";
        }
    }
}
