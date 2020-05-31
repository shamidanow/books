@extends('layouts.app')

@section('content')
	<h1 class="title">{{ $book->title }}</h1>

	<div class="content">
		<label class="label">Название книги:</label>
		<div>
			{{ $book->title }}
		</div>

        <label class="label">Автор(ы):</label>
        <div>
            {{ $book->authors()->get()->implode('name', ', ') }}
        </div>
	</div>
    <div class="content">
        <form method="LINK" action="/books/{{ $book->id }}/edit">
            <input type="submit" class="button is-link" value="Редактировать">
        </form>
    </div>
@endsection
