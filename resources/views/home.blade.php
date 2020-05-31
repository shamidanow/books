@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Список книг с указанием автора
        </div>
        <table class="table table_sort">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Автор(ы)</th>
                    <th>Кол-во авторов</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->authors()->get()->implode('name', ', ') }}</td>
                    <td>{{ $book->authors->count() }}</td>
                    <td>
                        <a
                            class="delete"
                            title="Удалить"
                            form="delete-{{ $book->id }}"
                            onClick="confirmDelete({{ $book->id }});"
                        >
                        </a>
                        <form
                            action="{{
                            route('books.destroy', [
                                'book' => $book->id,
                            ])
                        }}"
                            method="POST"
                            style="display: none;"
                            id="delete-{{ $book->id }}"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td>
                        <a href="/books/{{ $book->id }}/edit" title="Редактировать"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex;">
            <form method="LINK" action="/books/create" style="margin-left: auto; margin-right: 10px;">
                <input type="submit" class="button is-link" value="Добавить книгу">
            </form>
            <form method="LINK" action="/books" style="margin-left: 10px; margin-right: auto;">
                <input type="submit" class="button is-link" value="Список всех книг">
            </form>
        </div>

        <div class="title m-b-md">
            Список авторов с книгами
        </div>
        <table class="table table_sort">
            <thead>
            <tr>
                <th>#</th>
                <th>Автор</th>
                <th>Книга(и)</th>
                <th>Кол-во книг</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->books()->get()->implode('title', ', ') }}</td>
                    <td>{{ $author->books->count() }}</td>
                    <td>
                        <a
                            class="delete"
                            title="Удалить"
                            form="delete-{{ $author->id }}"
                            onClick="confirmDelete({{ $author->id }});"
                        >
                        </a>
                        <form
                            action="{{
                            route('authors.destroy', [
                                'author' => $author->id,
                            ])
                        }}"
                            method="POST"
                            style="display: none;"
                            id="delete-{{ $author->id }}"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td>
                        <a href="/authors/{{ $author->id }}/edit" title="Редактировать"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex;">
            <form method="LINK" action="/authors/create" style="margin-left: auto; margin-right: 10px;">
                <input type="submit" class="button is-link" value="Добавить автора">
            </form>
            <form method="LINK" action="/authors" style="margin-left: 10px; margin-right: auto;">
                <input type="submit" class="button is-link" value="Список всех авторов">
            </form>
        </div>
    </div>
@endsection
