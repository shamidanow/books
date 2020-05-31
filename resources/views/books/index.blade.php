@extends('layouts.app')

@section('content')
	<h1 class="title">Список всех книг</h1>
	<table class="table">
        <tr>
            <th>#</th>
            <th>Название книги</th>
            <th>Кол-во авторов</th>
            <th></th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/books/{{ $book->id }}" title="Показать">{{ $book->title }}</a></td>
            <td>{{ $book->authors->count() }}</td>
            <td>
                <a href="/books/{{ $book->id }}/edit" title="Редактировать"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="column">
    	<form method="LINK" action="/books/create">
            <input type="submit" class="button is-link" value="Добавить новую книгу">
        </form>
    </div>
@endsection
