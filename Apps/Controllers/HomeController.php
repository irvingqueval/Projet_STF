<?php

namespace Apps\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = "Home";

        \Apps\libs\Renderer::render("home", ["pageTitle" => $pageTitle]);
    }
}
