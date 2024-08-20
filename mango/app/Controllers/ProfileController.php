<?php

namespace App\Controllers;
use App\Models\Book;

class ProfileController extends Controller
{
    public function index()
    {
        $book = new Book();
        return view("post/index", [
            "message" => "Hello from Profile Index Controller!",
            "book" => $book->getAll()
        ]);
    }

    public function edit()
    {
        // $message = "Hello from view of post::edit";
        // return $this->view("post/edit", [$message]);
        return view("post/edit", [
            "message" => "Hello from controller!",
        ]);
    }

    public function to_another_route()
    {
        return redirect("route_two");
    }
    public function another_method()
    {
        echo "This is not route one. Another";
    }
}