<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../functions.php';

$api = require __DIR__ . '/../api.php';
$routes = require __DIR__ . '/../routes.php';

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    header('Content-Type: text/html');
    view($routes[$_SERVER['REQUEST_URI']]);
} else if (array_key_exists($_SERVER['REQUEST_URI'], $api)) {
    header('Content-Type: application/json');
    require __DIR__ . '/../' . $api[$_SERVER['REQUEST_URI']];
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}