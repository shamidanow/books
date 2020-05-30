<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Война и мир'
            ],
            [
                'title' => 'Приключения Тома Сойера'
            ],
            [
                'title' => 'Мёртвые души'
            ],
            [
                'title' => 'Разработка веб-приложений с помощью PHP и MySQL'
            ]
        ]);
    }
}
