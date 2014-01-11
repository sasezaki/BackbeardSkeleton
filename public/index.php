<?php
use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;

chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

require dirname(__DIR__).'/vendor/autoload.php';

(new Backbeard\Dispatcher(
    include dirname(__DIR__).'/config/application.php',
    include dirname(__DIR__).'/config/services.php')
)->dispatch(new Request, new Response)->send();
