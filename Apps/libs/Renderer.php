<?php

namespace Apps\libs;

class Renderer
{
    public static function render(string $path, array $variables = [])
    {
        extract($variables);

        ob_start();
        // Use a path relative to the application entry point
        require_once 'Apps/Views/' . $path . '.php';
        $pageContent = ob_get_clean();

        require_once 'Apps/Views/layout.php';
    }
}
