@extends('layouts.app')

@section('content')
	<h1 class="title">Редактировать автора</h1>

    <div class="content">
        <form method="POST" action="/authors/{{ $author->id }}">
            @csrf
            @method('PATCH')

            @foreach ($authorBooksIds as $authorBooksId)
                <input type="hidden" name="authorBooks[]" value="{{ $authorBooksId }}">
            @endforeach

            <div class="field">
                <label class="label" for="name">Имя автора</label>

                <div class="control">
                    <input type="text" class="input" name="name" placeholder="Название книги" value="{{ $author->name }}">
                </div>
            </div>

            <div class="field">
                <label class="label" for="selectedBooks[]">
                    Книга(и) автора
                </label>

                <div class="form-group">
                    @foreach ($books as $book)
                        <input
                            name="selectedBooks[]"
                            type="checkbox"
                            value="{{ $book->id }}"
                            {{ old('selectedBooks[]', in_array($author->id,$book->authors->pluck('id')->toArray())) ? 'checked="checked"' : '' }}
                        > {{ $book->title }}
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

        <form method="POST" action="/books/{{ $author->id }}" id="delete-{{ $author->id }}">
            @method('DELETE')
            @csrf

            <div class="field">
                <div class="control">
                    <button type="button" class="button is-danger" onClick="confirmDelete({{ $author->id }});">Удалить автора</button>
                </div>
            </div>
        </form>
    </div>
@endsection
