<?php

use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstAuthor = \App\Author::all()->first();
        $firstBook = \App\Book::all()->first();
        if ( !is_null($firstAuthor) && !is_null($firstBook) ) {
            DB::statement('truncate table author_book');
            DB::table('author_book')->insert([
                [
                    'author_id' => !is_null(\App\Author::whereName('Лев Толстой')->first()) ? \App\Author::whereName('Лев Толстой')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Война и мир')->first()) ? \App\Book::whereTitle('Война и мир')->first()->id : $firstBook->id
                ],
                [
                    'author_id' => !is_null(\App\Author::whereName('Лев Толстой')->first()) ? \App\Author::whereName('Лев Толстой')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Анна Каренина')->first()) ? \App\Book::whereTitle('Анна Каренина')->first()->id : $firstBook->id
                ],
                [
                    'author_id' => !is_null(\App\Author::whereName('Марк Твен')->first()) ? \App\Author::whereName('Марк Твен')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Приключения Тома Сойера')->first()) ? \App\Book::whereTitle('Приключения Тома Сойера')->first()->id : $firstBook->id
                ],
                [
                    'author_id' => !is_null(\App\Author::whereName('Николай Гоголь')->first()) ? \App\Author::whereName('Николай Гоголь')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Мёртвые души')->first()) ? \App\Book::whereTitle('Мёртвые души')->first()->id : $firstBook->id
                ],
                [
                    'author_id' => !is_null(\App\Author::whereName('Люк Веллинг')->first()) ? \App\Author::whereName('Люк Веллинг')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Разработка веб-приложений с помощью PHP и MySQL')->first()) ? \App\Book::whereTitle('Разработка веб-приложений с помощью PHP и MySQL')->first()->id : $firstBook->id
                ],
                [
                    'author_id' => !is_null(\App\Author::whereName('Лора Томсон')->first()) ? \App\Author::whereName('Лора Томсон')->first()->id : $firstAuthor->id,
                    'book_id' => !is_null(\App\Book::whereTitle('Разработка веб-приложений с помощью PHP и MySQL')->first()) ? \App\Book::whereTitle('Разработка веб-приложений с помощью PHP и MySQL')->first()->id : $firstBook->id
                ]
            ]);
        }
    }
}
