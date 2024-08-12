<?php

namespace Apps\libs;

class redirect
{
    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit();
    }
}
