<?php

namespace App\Controllers;

use App\Application;

class Controller
{
    public function render($view)
    {
        return Application::$app->router->renderView($view);
    }
}