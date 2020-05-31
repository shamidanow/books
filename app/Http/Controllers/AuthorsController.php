<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\AuthorStore;
use Illuminate\Http\Request;

class AuthorsController extends Controller
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
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('authors.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStore $request)
    {
        $author = Author::create($request->all());
        $author->save();
        if ( !is_null($request->get('selectedBooks')) ) {
            foreach ($request->get('selectedBooks') as $bookId) {
                $author->books()->attach($bookId);
            }
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $books = Book::all();
        $authorBooksIds = $author->books->pluck('id');
        return view('authors.edit',compact('author','books','authorBooksIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorStore $request, Author $author)
    {
        $author->fill($request->all());
        $author->save();
        if ( !is_null($request->get('authorBooks')) ) {
            foreach ($request->get('authorBooks') as $bookId) {
                $author->books()->detach($bookId);
            }
        }
        if ( !is_null($request->get('selectedBooks')) ) {
            foreach ($request->get('selectedBooks') as $bookId) {
                $author->books()->attach($bookId);
            }
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('home');
    }
}
