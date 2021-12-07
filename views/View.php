<?php

namespace MusicBoxApp\Views;

class View
{
    private string $view_name;

    public function __construct()
    {
    }

    public function render($view_name)
    {
        $authorized = null;
        $this->normalizeViewName($view_name);
        include_once VIEW_DIR_PATH . '/templates/' . $this->view_name . '.php';
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
}