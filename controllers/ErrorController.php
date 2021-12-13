<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Views as Views;

class ErrorController
{
    private $view;

    public function __construct()
    {
        $this->view = new Views\View();
    }

    public function showErrorPage($error_message)
    {
        $this->view->renderErrorPage($error_message);
    }
}
