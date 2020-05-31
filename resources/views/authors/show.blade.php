@extends('layouts.app')

@section('content')
	<h1 class="title">{{ $author->name }}</h1>

	<div class="content">
		<label class="label">Имя автора:</label>
		<div>
			{{ $author->name }}
		</div>

        <label class="label">Книга(и):</label>
        <div>
            {{ $author->books()->get()->implode('title', ', ') }}
        </div>
	</div>
    <div class="content">
        <form method="LINK" action="/authors/{{ $author->id }}/edit">
            <input type="submit" class="button is-link" value="Редактировать">
        </form>
    </div>
@endsection
