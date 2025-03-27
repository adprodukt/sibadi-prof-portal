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
        DB::table('educational_institutions')->insert([
            ['educational_institution' => 'СОШ Школа',],
            ['educational_institution' => 'Лицей',],
            ['educational_institution' => 'Гимназия',],
            ['educational_institution' => 'СПО Колледж',],
            ['educational_institution' => 'Университет',],
        ]);
        
        DB::table('courses')->insert([
            ['course' => '9',],
            ['course' => '10',],
            ['course' => '11',],
            ['course' => 'Колледж 1 курс',],
            ['course' => 'Колледж 2 курс',],
            ['course' => 'Колледж 3 курс',],
            ['course' => 'Колледж 4 курс',],
            ['course' => 'Университет',],
        ]);
        DB::table('directions')->insert([
            ['direction' => '«Автомобильно-дорожное, промышленное и гражданское строительство»',],
            ['direction' => '«Архитектура»',],
            ['direction' => '«Информационные системы, экономика и управление»',],
            ['direction' => '«Профессиональное обучение»',],
            ['direction' => '«Нефтегазовый сервис. нефтегазовое дело»',],
            ['direction' => '«Информационная безопасность»',],
            ['direction' => '«Мехатроника и робототехника»',],
        ]);
        DB::table('days')->insert([
            [
                'title' => null,
                'status' => 1,
                'time' => '15:00',
                'date' => '2025-03-20',
                'address' => 'Мира 5 к.3',
                'description' => "- Знакомство с институтами СибАДИ и их специализациями;
                    - Подробная информация об образовательных программах и научных исследованиях;
                    - Встреча с преподавателями и студентами;
                    - Обзор особенностей учебного процесса и возможностей для практической деятельности;
                    - Ответы на все ваши вопросы о поступлении и обучении",
                'direction_id' => null,
            ],
            [
                'title' => null,
                'status' => 1,
                'time' => '15:00',
                'date' => '2025-03-29',
                'address' => 'Мира 5 к.3',
                'description' => "- Знакомство с институтами СибАДИ и их специализациями;
                    - Подробная информация об образовательных программах и научных исследованиях;
                    - Встреча с преподавателями и студентами;
                    - Обзор особенностей учебного процесса и возможностей для практической деятельности;
                    - Ответы на все ваши вопросы о поступлении и обучении",
                'direction_id' => 1,
            ],
            [
                'title' => 'День открытых дверей для всех',
                'status' => 1,
                'time' => '15:00',
                'date' => '2025-03-30',
                'address' => 'Мира 5 к.3',
                'description' => "- Знакомство с институтами СибАДИ и их специализациями;
                    - Подробная информация об образовательных программах и научных исследованиях;
                    - Встреча с преподавателями и студентами;
                    - Обзор особенностей учебного процесса и возможностей для практической деятельности;
                    - Ответы на все ваши вопросы о поступлении и обучении",
                'direction_id' => null,
            ],
            [
                'title' => null,
                'status' => 0,
                'time' => '15:00',
                'date' => '2025-03-31',
                'address' => 'Мира 5 к.3',
                'description' => "- Знакомство с институтами СибАДИ и их специализациями;
                    - Подробная информация об образовательных программах и научных исследованиях;
                    - Встреча с преподавателями и студентами;
                    - Обзор особенностей учебного процесса и возможностей для практической деятельности;
                    - Ответы на все ваши вопросы о поступлении и обучении",
                'direction_id' => 3,
            ],
        ]);


        
    }
}
