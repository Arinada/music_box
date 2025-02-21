<?php
require_once 'PSR4AutoloaderClass.php';

const CONTROLLER_DIR_PATH = __DIR__ . '/controllers';
const VIEW_DIR_PATH = __DIR__ . '/views';
const AUDIO_RECORDS_DIR = __DIR__ . '/audio_records/';

const NAMESPACE_APP_PREFIX = 'MusicBoxApp\\';
const NAMESPACE_CONTROLLER_PREFIX = NAMESPACE_APP_PREFIX . 'Controllers\\';
const NAMESPACE_VIEW_PREFIX = NAMESPACE_APP_PREFIX . 'Views\\';
const NAMESPACE_MODEL_PREFIX = NAMESPACE_APP_PREFIX . 'Models\\';
const NAMESPACE_CONFIG_PREFIX = NAMESPACE_APP_PREFIX . 'Configs\\';

$loader = new MusicBoxApp\Autoloader\Psr4AutoloaderClass();
$loader->register();

$router = new MusicBoxApp\Routes\Router();
$router->callRoute();
