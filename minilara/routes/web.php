<?php

use Abdulalim07\Minilara\Http\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']); //->name('home');

Route::get('/about', function () {
    echo 'About Page';
});