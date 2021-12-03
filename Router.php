<?php

namespace MusicBoxApp;

class Router
{

    public function __construct($routes)
    {

        $url_str = $this->getURLString();
        $controller_data = '';

        foreach ($routes as $key => $value) {
            //echo '</br> key: ' . $key . " value: " . $value;
            //$matches_counter = preg_match_all($url_mask, $key);
            if (stristr($key, $url_str, true) !== false) {
                $controller_data = $value;
                break;
            }
        }

        $this->callController($controller_data);
    }

    private function callController($controller_data)
    {
        $controller_str_classname = $controller_data['classname'];
        $controller_classname = NAMESPACE_CONTROLLER_PREFIX . $controller_str_classname;
        $controller_method = $controller_data['method'];
        $controller_param_name = null;
        foreach ($controller_data['params'] as $param_name) {
            $controller_param_name = $param_name;
            break;
        }
        $controller_param_value = $_GET[$controller_param_name];
        $controller = null;

        if ($controller_classname !== null) {
            $controller = new  $controller_classname($controller_str_classname);
        }
        if (($controller_method !== null && $controller_method !== "") && $controller_param_value === null) {
            $controller->$controller_method();
        }
        if ($controller_method !== null && $controller_param_value !== null) {
            $controller->$controller_method($controller_param_value);
        }
    }

    private function getURLString(): string
    {
        $url_elements =  parse_url($_SERVER['REQUEST_URI']);

        $url_path =  $url_elements["path"];
        $url_path =  substr($url_path, 1);

        $url_path_elements =  explode('/', $url_path);

        $url_query = $url_elements["query"];
        $url_query = stristr($url_query, '=', true);

        $url_mask = '';

        foreach ($url_path_elements as $el) {
            $url_mask = $url_mask . '/' . $el;
        }

        if ($url_query) {
            $url_mask = $url_mask . '?' . $url_query;
        }

        return $url_mask;
    }

/*    private function getURLMask(): string
    {
        $url_elements =  parse_url($_SERVER['REQUEST_URI']);

        $url_path =  $url_elements["path"];
        $url_path =  substr($url_path, 1);

        $url_path_elements =  explode('/', $url_path);

        $url_query = $url_elements["query"];
        $url_query = stristr($url_query, '=', true);

        $url_mask = '';

        foreach ($url_path_elements as $el) {
            $url_mask = $url_mask . '/' . $el;
        }

        if ($url_query) {
            $url_mask = $url_mask . '?' . $url_query . '=.*';
        }

        return $url_mask;
    }*/
}
