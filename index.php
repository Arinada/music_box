<?php
 //require 'MainPage.php';
   require_once 'PSR4AutoloaderClass.php';

   const CONTROLLER_DIR_PATH = __DIR__ . '/controllers';
   const VIEW_DIR_PATH = __DIR__ . '/views';
   const AUDIO_RECORDS_DIR = __DIR__ . '/audio_records/';

   const NAMESPACE_APP_PREFIX = 'MusicBoxApp\\';
   const NAMESPACE_CONTROLLER_PREFIX = NAMESPACE_APP_PREFIX . 'Controllers\\';
   const NAMESPACE_VIEW_PREFIX = NAMESPACE_APP_PREFIX . 'Views\\';

   $loader = new Example\Psr4AutoloaderClass();
   $loader->register();

   $loader->addNamespace(NAMESPACE_APP_PREFIX, __DIR__);
   $loader->addNamespace(NAMESPACE_APP_PREFIX . 'Routes\\', __DIR__ . '/route');
   //$loader->addNamespace(NAMESPACE_APP_PREFIX . 'Autoloader', __DIR__);
   $loader->addNamespace(NAMESPACE_CONTROLLER_PREFIX, CONTROLLER_DIR_PATH);
   $loader->addNamespace(NAMESPACE_VIEW_PREFIX, VIEW_DIR_PATH);

   $router = new MusicBoxApp\Routes\Router();
   $router->callRoute();
