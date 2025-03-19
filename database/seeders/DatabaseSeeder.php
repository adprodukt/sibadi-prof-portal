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

        // DB::table('roles')->insert([
        //     'id' => 1,
        //     'role' => 'Администратор',
        // ]);
        // DB::table('roles')->insert([
        //     'id' => 2,
        //     'role' => 'Организатор',
        // ]);
        // DB::table('users')->insert([
        //     'role_id' => 1,
        //     'name' => 'Admin',
        //     'login' => 'admin',
        //     'email' => 'admin@mail.ru',
        //     'password' => Hash::make('admin'),

        // ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Admin',
            'login' => 'admin1',
            'email' => 'admin1@mail.ru',
            'password' => Hash::make('admin'),

        ]);
    }
}
