@extends('layouts.app')

@section('content')
	<h1 class="title">Добавление новой книги</h1>

	<form method="post" action="/books">
        @csrf

        <div class="field">
            <label for="title">
                Название книги
            </label>
            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" placeholder="Введите название книги">
        </div>

        <div class="field">
            <label for="selectedAuthors[]">
                Выберите автора(ов) книги
            </label>

            <div class="form-group">
                @foreach ($authors as $author)
                    <input type="checkbox" name="selectedAuthors[]" value="{{ $author->id }}"> {{ $author->name }}
                @endforeach
            </div>
        </div>

		<div class="field">
			<button type="submit" class="button is-link">Добавить книгу</button>
		</div>

		@include('errors')
	</form>
@endsection
