<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('roles')->insert([
            'id' => 1,
            'role' => 'Администратор',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'role' => 'Организатор',
        ]);
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Admin',
            'login' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('admin'),

        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'user',
            'login' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('user'),

        ]);
        DB::table('directions')->insert([
            ['direction' => 'СОШ Школа',],
            ['direction' => 'Лицей',],
            ['direction' => 'Гимназия',],
            ['direction' => 'СПО Колледж',],
            ['direction' => 'Университет',],
        ]);
        
        DB::table('educational_institutions')->insert([
            ['educational_institution' => '9',],
            ['educational_institution' => '10',],
            ['educational_institution' => '11',],
            ['educational_institution' => 'Колледж 1 курс',],
            ['educational_institution' => 'Колледж 2 курс',],
            ['educational_institution' => 'Колледж 3 курс',],
            ['educational_institution' => 'Колледж 4 курс',],
            ['educational_institution' => 'Университет',],
        ]);
    }
}
