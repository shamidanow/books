<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::statement('truncate table authors');
        DB::statement("SET foreign_key_checks=1");
        DB::table('authors')->insert([
            [
                'name' => 'Лев Толстой'
            ],
            [
                'name' => 'Марк Твен'
            ],
            [
                'name' => 'Николай Гоголь'
            ],
            [
                'name' => 'Люк Веллинг'
            ],
            [
                'name' => 'Лора Томсон'
            ],
        ]);
    }
}
