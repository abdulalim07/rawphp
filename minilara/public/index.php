<?php
use Abdulalim07\Minilara\Http\Request;
use Abdulalim07\Minilara\Http\Response;
use Abdulalim07\Minilara\Http\Route;

require_once __DIR__ . "/../src/Support/helper.php";
require_once base_path() . "/vendor/autoload.php";
require_once base_path() . "/routes/web.php";

$route = new Route(new Request(), new Response());

$route->resolve();