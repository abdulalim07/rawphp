<?php
use App\Controllers\ProfileController;

return [
    "/users/profile" => [ProfileController::class, "index"],
    "/users/profile/edit" => [ProfileController::class, "edit"],
    "/route_one" => [ProfileController::class, "to_another_route"],
    "/route_two" => [ProfileController::class, "another_method"],
];