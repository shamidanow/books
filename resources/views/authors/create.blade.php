@extends('layouts.app')

@section('content')
	<h1 class="title">Добавление нового автора</h1>

	<form method="post" action="/authors">
        @csrf

        <div class="field">
            <label for="title">
                Имя автора
            </label>
            <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="Введите имя автора">
        </div>

        <div class="field">
            <label for="selectedBooks[]">
                Выберите книгу(и) автора
            </label>

            <div class="form-group">
                @foreach ($books as $book)
                    <input type="checkbox" name="selectedBooks[]" value="{{ $book->id }}"> {{ $book->title }}
                @endforeach
            </div>
        </div>

		<div class="field">
			<button type="submit" class="button is-link">Добавить автора</button>
		</div>

		@include('errors')
	</form>
@endsection
