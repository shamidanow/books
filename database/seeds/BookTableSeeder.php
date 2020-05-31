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
        DB::statement("SET foreign_key_checks=0");
        DB::statement('truncate table books');
        DB::statement("SET foreign_key_checks=1");
        DB::table('books')->insert([
            [
                'title' => 'Война и мир'
            ],
            [
                'title' => 'Анна Каренина'
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
