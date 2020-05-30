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
