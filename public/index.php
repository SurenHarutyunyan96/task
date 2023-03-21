<?php

use App\Config\DatabaseConnection;
use App\Application;
use App\Controllers\LeadController;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

define("DB", DatabaseConnection::getInstance());

$app = new Application();

$app->router->get('/index', [new LeadController(), 'index']);
$app->router->get('/index2', [new LeadController(), 'index2']);
$app->router->get('/banner', [new LeadController(), 'banner']);

$app->run();