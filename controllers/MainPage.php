<?php

namespace MusicBoxApp\Controllers;

class MainPage
{
    private string $view_name;

    public function __construct($view_name)
    {
        $this->normalizeViewName($view_name);
        $this->callView();
        //NAMESPACE_VIEW_PREFIX . $view_name;
        // echo "Мы в контроллере MAIN PAGE";
    }

    private function callView()
    {
        $authorized = null;
        include VIEW_DIR_PATH . '/templates/' . $this->view_name . '.php';
    }

    private function normalizeViewName($view_name)
    {
        $normal_view_name = strtolower($view_name[0]);
        for ($i = 1; $i < mb_strlen($view_name); $i++) {
            if (ctype_upper($view_name[$i])) {
                $normal_view_name = $normal_view_name . '_';
            }
            $normal_view_name = $normal_view_name . strtolower($view_name[$i]);
        }
        $this->view_name = $normal_view_name;
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
