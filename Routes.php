<?php

namespace MusicBoxApp;

class Routes
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => array
                (
                    'classname' => 'MainPage',
                    'method' => null,
                    'params' => array()
                ),
            '/search' => array
                (
                    'classname' => 'MainPage',
                    'method' => 'search',
                    'params' => array()
                ),
            '/search?page={num}' => array
                (
                    'classname' => 'MainPage',
                    'method' => 'search',
                    'params' => array( 'page' => null)
                ),
            '/main_page/search?page={num}' => 'MainPage/search/page',
            '/main_page/check' => 'MainPage/check'
        ];
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}

/*class Router
{
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/');

        $url_elements =  parse_url($url);
        $url_path =  $url_elements["path"];
        $url_anchor = parse_url($url, PHP_URL_FRAGMENT);
        $url_path = substr($url_path, 1);
        $url_path_elements =  explode('/', $url_path);
        $first_path_name_el = explode("_", $url_path_elements[0]);
        $controller_name = ucfirst($first_path_name_el[0]) . ucfirst($first_path_name_el[1]) . 'Controller';

        $filepath = 'controllers/' . $controller_name . '.php';
        App\Autoloader\spl_autoload_register($filepath);
        $controller = new $controller_name();

        $second_path_name_el = $url_path_elements[1];
        if (isset($url_path_elements[1]))
            $controller->$second_path_name_el();
    }
}*/
