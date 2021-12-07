<?php

namespace MusicBoxApp\Controllers;

class MainPage
{
    private string $view_name;

    public function __construct($view_name)
    {
        $this->view_name = $view_name;
        $this->callView();
        //NAMESPACE_VIEW_PREFIX . $view_name;
        // echo "Мы в контроллере MAIN PAGE";
    }

    private function callView()
    {
        $authorized = null;
        include VIEW_DIR_PATH . '/templates/' . $this->view_name . '.php';
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
