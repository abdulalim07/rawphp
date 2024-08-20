<?php

// Autoload Classes
require_once __DIR__ . "/../vendor/autoload.php";

// Get all routes
$routes = require_once __DIR__ . "/../routes/web.php";

$request = $_SERVER['REQUEST_URI'];
$request = explode("?", $request)[0];

[$controller, $action] = $routes[$request] ?? [null, null];

if ($controller && $action) {
    $controllerInstance = new $controller();

    $controllerInstance->$action();
} else {
    throw new Exception("404 not found", 1);
}