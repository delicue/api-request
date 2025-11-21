<?php

use Api\ApiRouter;
use Api\Database;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../functions.php';

// $api = [
//     '/users' => $db->isValidApiKey('test') ? 'data/users.json' : null,
//     '/posts' => $db->isValidApiKey('test') ? 'data/posts.json' : null,
// ];

$routes = require __DIR__ . '/../routes.php';

$apiRouter = new ApiRouter();
$url = parse_url($_SERVER['REQUEST_URI']);
$uri = $url['path'];
$method = $_SERVER['REQUEST_METHOD'];

if (array_key_exists($uri, $routes)) {
    header('Content-Type: text/html');
    view($routes[$_SERVER['REQUEST_URI']]);
    return;
}

$apiRouter->get('/users', function() {
    $apiKey = $_GET['apiKey'];
    $db = Database::getInstance();
    if($db->isValidApiKey($apiKey)){
        header('Content-Type: application/json');
        return jsonData('users');
    } else {
        http_response_code(403);
        return "Unauthorized";
    }
});

$apiRouter->dispatch($uri, $method);