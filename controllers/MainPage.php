<?php

namespace MusicBoxApp\Controllers;

use MusicBoxApp\Views as Views;

class MainPage
{
    private string $view_name;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->callView();
    }

    private function callView()
    {
        $view = new Views\View();
        $view->render($this->view_name);
    }

    public function search($num)
    {
        echo $num;
    }

    public function check()
    {
        echo " checkaem";
    }
}
