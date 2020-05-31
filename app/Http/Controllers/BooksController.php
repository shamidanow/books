<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookStore;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStore $request)
    {
        $book = Book::create($request->all());
        $book->save();
        if ( !is_null($request->get('selectedAuthors')) ) {
            foreach ($request->get('selectedAuthors') as $authorId) {
                $book->authors()->attach($authorId);
            }
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $bookAuthorsIds = $book->authors->pluck('id');
        return view('books.edit',compact('book','authors','bookAuthorsIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookStore $request, Book $book)
    {
        $book->fill($request->all());
        $book->save();
        if ( !is_null($request->get('bookAuthors')) ) {
            foreach ($request->get('bookAuthors') as $authorId) {
                $book->authors()->detach($authorId);
            }
        }
        if ( !is_null($request->get('selectedAuthors')) ) {
            foreach ($request->get('selectedAuthors') as $authorId) {
                $book->authors()->attach($authorId);
            }
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('home');
    }
}
