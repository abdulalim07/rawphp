<?php

namespace App\Controllers;
use Abdulalim07\Minilara\View\View;

class HomeController
{
    public function index()
    {
        return View('home.index', [
            'name' => 'Abdul Alim'
        ]);
    }
}