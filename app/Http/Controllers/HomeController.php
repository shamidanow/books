<?php

namespace App\Http\Controllers;

use App\Author;
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
        $books = Book::has('authors')->get();
        $authors = Author::has('books')->get();
        return view('home', compact('books','authors'));
    }

    public function welcome()
    {
        $books = Book::has('authors')->get();
        $authors = Author::has('books')->get();
        return view('welcome', compact('books','authors'));
    }

    public function parse()
    {
        return view('parse');
    }

    public function parseRequest(Request $request)
    {
        $text = $request->string;
        preg_match_all('~[-a-z0-9_]+(?:\\.[-a-z0-9_]+)*@[-a-z0-9]+(?:\\.[-a-z0-9]+)*\\.[a-z]+~i', $text, $matches);
        $result = implode("\n",$matches[0]);
        return response()->json($result,200);
    }
}
