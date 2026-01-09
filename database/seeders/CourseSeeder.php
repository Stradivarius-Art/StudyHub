<?php

namespace Database\Seeders;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Laravel для начинающих',
                'description' => 'Полный курс по фреймворку Laravel. Изучите основы и продвинутые техники разработки веб-приложений.',
                'hours' => 40.5,
                'img' => 'https://example.com/images/laravel-course.jpg',
                'start_date' => Carbon::now()->addDays(10),
                'end_date' => Carbon::now()->addDays(60),
                'price' => 299.99
            ],
            [
                'name' => 'JavaScript и React',
                'description' => 'Современный JavaScript и фреймворк React. Создавайте интерактивные пользовательские интерфейсы.',
                'hours' => 35.0,
                'img' => 'https://example.com/images/react-course.jpg',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(45),
                'price' => 249.99
            ],
            [
                'name' => 'Python для анализа данных',
                'description' => 'Изучите Python и библиотеки для анализа данных: Pandas, NumPy, Matplotlib.',
                'hours' => 45.0,
                'img' => 'https://example.com/images/python-course.jpg',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(75),
                'price' => 349.99
            ],
            [
                'name' => 'Веб-дизайн и UI/UX',
                'description' => 'Основы веб-дизайна, пользовательского опыта и создание современных интерфейсов.',
                'hours' => 30.0,
                'img' => 'https://example.com/images/design-course.jpg',
                'start_date' => Carbon::now()->addDays(20),
                'end_date' => Carbon::now()->addDays(50),
                'price' => 199.99
            ],
            [
                'name' => 'Базы данных и SQL',
                'description' => 'Глубокое погружение в реляционные базы данных, SQL запросы и оптимизацию.',
                'hours' => 25.5,
                'img' => 'https://example.com/images/sql-course.jpg',
                'start_date' => Carbon::now()->addDays(8),
                'end_date' => Carbon::now()->addDays(38),
                'price' => 179.99
            ],
            [
                'name' => 'Мобильная разработка на Flutter',
                'description' => 'Создавайте кроссплатформенные мобильные приложения с помощью Flutter и Dart.',
                'hours' => 50.0,
                'img' => 'https://example.com/images/flutter-course.jpg',
                'start_date' => Carbon::now()->addDays(25),
                'end_date' => Carbon::now()->addDays(85),
                'price' => 399.99
            ],
            [
                'name' => 'DevOps и Docker',
                'description' => 'Автоматизация развертывания, контейнеризация и непрерывная интеграция.',
                'hours' => 28.0,
                'img' => 'https://example.com/images/devops-course.jpg',
                'start_date' => Carbon::now()->addDays(12),
                'end_date' => Carbon::now()->addDays(40),
                'price' => 319.99
            ],
            [
                'name' => 'Машинное обучение',
                'description' => 'Введение в машинное обучение с использованием Python и библиотек scikit-learn, TensorFlow.',
                'hours' => 55.0,
                'img' => 'https://example.com/images/ml-course.jpg',
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(90),
                'price' => 449.99
            ],
            [
                'name' => 'Кибербезопасность',
                'description' => 'Основы информационной безопасности, защита веб-приложений и сетей.',
                'hours' => 32.0,
                'img' => 'https://example.com/images/security-course.jpg',
                'start_date' => Carbon::now()->addDays(18),
                'end_date' => Carbon::now()->addDays(58),
                'price' => 279.99
            ],
            [
                'name' => 'Разработка игр на Unity',
                'description' => 'Создание 2D и 3D игр с использованием движка Unity и языка C#.',
                'hours' => 48.0,
                'img' => 'https://example.com/images/unity-course.jpg',
                'start_date' => Carbon::now()->addDays(22),
                'end_date' => Carbon::now()->addDays(78),
                'price' => 369.99
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        $this->command->info('Создано ' . count($courses) . ' курсов');
    }
}