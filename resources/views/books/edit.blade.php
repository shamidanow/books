@extends('layouts.app')

@section('content')
	<h1 class="title">Редактировать книгу</h1>

    <div class="content">
        <form method="POST" action="/books/{{ $book->id }}">
            @csrf
            @method('PATCH')

            @foreach ($bookAuthorsIds as $bookAuthorsId)
                <input type="hidden" name="bookAuthors[]" value="{{ $bookAuthorsId }}">
            @endforeach

            <div class="field">
                <label class="label" for="title">Название книги</label>

                <div class="control">
                    <input type="text" class="input" name="title" placeholder="Название книги" value="{{ $book->title }}">
                </div>
            </div>

            <div class="field">
                <label class="label" for="selectedAuthors[]">
                    Автор(ы) книги
                </label>

                <div class="form-group">
                    @foreach ($authors as $author)
                        <input
                            name="selectedAuthors[]"
                            type="checkbox"
                            value="{{ $author->id }}"
                            {{ old('selectedAuthors[]', in_array($book->id,$author->books->pluck('id')->toArray())) ? 'checked="checked"' : '' }}
                        > {{ $author->name }}
                    @endforeach
                </div>
            </div>

            <div class="content">
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Обновить</button>
                    </div>
                </div>
            </div>
        </form>

        @include('errors')

        <form method="POST" action="/books/{{ $book->id }}" id="delete-{{ $book->id }}">
            @method('DELETE')
            @csrf

            <div class="field">
                <div class="control">
                    <button type="button" class="button is-danger" onClick="confirmDelete({{ $book->id }});">Удалить книгу</button>
                </div>
            </div>
        </form>
    </div>
@endsection
