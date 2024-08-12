<?php

spl_autoload_register(function ($className) {
    // Correction for namespace and correct file path construction
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $base_dir = __DIR__ . '/../../'; // Make sure this path is correct

    $file = $base_dir . $className . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
