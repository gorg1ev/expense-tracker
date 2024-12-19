<?php

use App\App;
use App\Controller\HomeController;
use App\Controller\ListController;
use App\Router;
use App\Service\HelperService;

require_once __DIR__ . '/../vendor/autoload.php';

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';

HelperService::createStorageIfNotExist(STORAGE_PATH);


$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/list', [ListController::class, 'index', [STORAGE_PATH]])
    ->get('/list/table', [ListController::class, 'table', [STORAGE_PATH, 'doc', $_SERVER['QUERY_STRING']]])
    ->get('/list/download', [ListController::class, 'download', [STORAGE_PATH, 'doc', $_SERVER['QUERY_STRING']]])
    ->get('/list/delete', [ListController::class, 'delete', [STORAGE_PATH, 'doc', $_SERVER['QUERY_STRING']]]);

$app = new App($router, [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
]);

$app->run();

