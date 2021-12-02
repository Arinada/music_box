<?php

   require_once 'PSR4AutoloaderClass.php';

   const CONTROLLER_DIR_PATH = __DIR__ . '/controllers';
   const NAMESPACE_APP_PREFIX = 'MusicBoxApp\\';
   const NAMESPACE_CONTROLLER_PREFIX = NAMESPACE_APP_PREFIX . 'Controllers\\';

   $loader = new Example\Psr4AutoloaderClass();
   $loader->register();

   $loader->addNamespace(NAMESPACE_APP_PREFIX, __DIR__);
   $loader->addNamespace(NAMESPACE_APP_PREFIX . 'Autoloader', __DIR__);
   $loader->addNamespace(NAMESPACE_CONTROLLER_PREFIX, CONTROLLER_DIR_PATH);

   $routes_obj = new MusicBoxApp\Routes();
   $routes = $routes_obj->getRoutes();
   $router = new MusicBoxApp\Router($routes);
