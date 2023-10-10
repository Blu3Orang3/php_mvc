<?php

//enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


use App\App;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Config;
use App\Router;



require_once  __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


define('STORAGE_PATH', __DIR__ . '/../storage/');
define('VIEW_PATH', __DIR__ .  '/../views/');


$router = new Router();

$router
  ->get('/', [HomeController::class, 'index'])
  ->get('/download', [HomeController::class, 'download'])
  ->post('/upload', [HomeController::class, 'upload'])
  ->get('/about', [AboutController::class, 'index'])
  ->get('/about/create', [AboutController::class, 'create'])
  ->post('/about/create', [AboutController::class, 'store']);


(new App(
  $router,
  [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
  ],
  new Config($_ENV)
)
)->run();
