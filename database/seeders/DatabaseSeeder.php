<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Администратор
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@edu.com',
            'password' => Hash::make('course2025'),
            'role' => 'admin'
        ]);

        // Создаем студентов
        User::create([
            'name' => 'Иван Петров',
            'email' => 'ivan@example.com',
            'password' => Hash::make('Password1!'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Мария Сидорова',
            'email' => 'maria@example.com',
            'password' => Hash::make('Password1!'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Алексей Иванов',
            'email' => 'alexey@example.com',
            'password' => Hash::make('Password1!'),
            'role' => 'student'
        ]);

        $this->call([
            CourseSeeder::class,
            OrderSeeder::class,
            LessonSeeder::class,
        ]);
    }
}