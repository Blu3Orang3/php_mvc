<?php

use App\Router;
use App\View;

require_once  __DIR__ . '/../vendor/autoload.php';


//enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


define('STORAGE_PATH',__DIR__ . '/../storage/');
define('VIEW_PATH',__DIR__ .  '/../views/');



$router = new Router();

try {

$router
  ->get('/', [App\Controllers\HomeController::class, 'index'])
  ->get('/download', [App\Controllers\HomeController::class, 'download'])
  ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
  ->get('/about', [App\Controllers\AboutController::class, 'index'])
  ->get('/about/create', [App\Controllers\AboutController::class, 'create'])
  ->post('/about/create', [App\Controllers\AboutController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

} catch (\App\Exceptions\RouteNotFoundException $e) {

  http_response_code(404);

  echo View::make('error/404');
}