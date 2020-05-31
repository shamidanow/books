@extends('layouts.app')

@section('content')
	<h1 class="title">Список всех авторов</h1>
	<table class="table">
        <tr>
            <th>#</th>
            <th>Имя автора</th>
            <th>Кол-во книг</th>
            <th></th>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="/authors/{{ $author->id }}" title="Показать">{{ $author->name }}</a></td>
            <td>{{ $author->books->count() }}</td>
            <td>
                <a href="/authors/{{ $author->id }}/edit" title="Редактировать"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="column">
    	<form method="LINK" action="/authors/create">
            <input type="submit" class="button is-link" value="Добавить нового автора">
        </form>
    </div>
@endsection
