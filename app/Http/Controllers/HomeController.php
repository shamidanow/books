<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();

        $i = 1;
        foreach ($books as $book) {
            $book->setAttribute('number', $i);
            $i++;
        }

        return view('home', compact('books'));
    }

    public function welcome()
    {
        $books = Book::all();

        $i = 1;
        foreach ($books as $book) {
            $book->setAttribute('number', $i);
            $i++;
        }

        return view('welcome', compact('books'));
    }
}
