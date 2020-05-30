@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Список книг
        </div>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Авторы</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->number }}</td>
                    <td><a href="/books/{{ $book->id }}/edit" title="Редактировать">{{ $book->title }}</a></td>
                    <td>{{ $book->authors()->get()->implode('name', ', ') }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
