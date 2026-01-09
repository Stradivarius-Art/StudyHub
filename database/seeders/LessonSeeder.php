<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            $this->createLessonsForCourse($course);
        }

        $this->command->info("Созданы уроки для {$courses->count()} курсов");
    }

    private function createLessonsForCourse(Course $course): void
    {
        $lessonsData = $this->getLessonsDataByCourseType($course->name);

        foreach ($lessonsData as $index => $lessonData) {
            Lesson::create([
                'course_id' => $course->id,
                'name' => $lessonData['name'],
                'description' => $lessonData['description'],
                'video_link' => $this->generateVideoLink($course->name, $index + 1),
                'hours' => $lessonData['hours']
            ]);
        }
    }

    private function getLessonsDataByCourseType(string $courseName): array
    {
        return match (true) {
            str_contains($courseName, 'Laravel') => $this->getLaravelLessons(),
            str_contains($courseName, 'JavaScript') => $this->getJavaScriptLessons(),
            str_contains($courseName, 'Python') => $this->getPythonLessons(),
            str_contains($courseName, 'Веб-дизайн') => $this->getDesignLessons(),
            str_contains($courseName, 'Базы данных') => $this->getDatabaseLessons(),
            str_contains($courseName, 'Flutter') => $this->getFlutterLessons(),
            str_contains($courseName, 'DevOps') => $this->getDevOpsLessons(),
            str_contains($courseName, 'Машинное обучение') => $this->getMachineLearningLessons(),
            str_contains($courseName, 'Кибербезопасность') => $this->getSecurityLessons(),
            str_contains($courseName, 'Unity') => $this->getUnityLessons(),
            default => $this->getDefaultLessons(),
        };
    }

    private function generateVideoLink(string $courseName, int $lessonNumber): string
    {
        $courseSlug = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $courseName));
        return "https://example.com/videos/{$courseSlug}/lesson-{$lessonNumber}.mp4";
    }

    private function getLaravelLessons(): array
    {
        return [
            [
                'name' => 'Введение в Laravel',
                'description' => 'История фреймворка, установка и настройка окружения.',
                'hours' => 2.0,
            ],
            [
                'name' => 'Маршрутизация и контроллеры',
                'description' => 'Создание маршрутов, работа с контроллерами и методами.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Работа с базой данных и Eloquent',
                'description' => 'Миграции, модели Eloquent, отношения между моделями.',
                'hours' => 4.0,
            ],
            [
                'name' => 'Blade шаблонизатор',
                'description' => 'Создание шаблонов, наследование, директивы Blade.',
                'hours' => 2.5,
            ],
            [
                'name' => 'Формы и валидация',
                'description' => 'Работа с формами, CSRF защита, кастомная валидация.',
                'hours' => 3.5,
            ],
            [
                'name' => 'Аутентификация и авторизация',
                'description' => 'Система аутентификации Laravel, Middleware, политики доступа.',
                'hours' => 3.0,
            ],
        ];
    }

    private function getJavaScriptLessons(): array
    {
        return [
            [
                'name' => 'Основы JavaScript',
                'description' => 'Переменные, типы данных, операторы, функции.',
                'hours' => 2.5,
            ],
            [
                'name' => 'Работа с DOM',
                'description' => 'Манипуляции с элементами страницы, события.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Асинхронный JavaScript',
                'description' => 'Promises, async/await, работа с API.',
                'hours' => 3.5,
            ],
            [
                'name' => 'Введение в React',
                'description' => 'Компоненты, JSX, пропсы и состояние.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Хуки в React',
                'description' => 'useState, useEffect, кастомные хуки.',
                'hours' => 3.0,
            ],
        ];
    }

    private function getPythonLessons(): array
    {
        return [
            [
                'name' => 'Основы Python',
                'description' => 'Синтаксис, структуры данных, функции.',
                'hours' => 2.5,
            ],
            [
                'name' => 'Библиотека Pandas',
                'description' => 'DataFrames, Series, работа с данными.',
                'hours' => 4.0,
            ],
            [
                'name' => 'NumPy и математические операции',
                'description' => 'Массивы, линейная алгебра, случайные числа.',
                'hours' => 3.5,
            ],
            [
                'name' => 'Визуализация с Matplotlib',
                'description' => 'Графики, диаграммы, настройка отображения.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Анализ реальных данных',
                'description' => 'Практический проект по анализу данных.',
                'hours' => 4.0,
            ],
        ];
    }

    private function getDesignLessons(): array
    {
        return [
            [
                'name' => 'Основы дизайна',
                'description' => 'Композиция, цвет, типографика.',
                'hours' => 2.0,
            ],
            [
                'name' => 'UI/UX принципы',
                'description' => 'User Experience, пользовательские сценарии.',
                'hours' => 2.5,
            ],
            [
                'name' => 'Работа в Figma',
                'description' => 'Инструменты, компоненты, прототипирование.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Адаптивный дизайн',
                'description' => 'Mobile-first, брейкпоинты, сетки.',
                'hours' => 2.5,
            ],
        ];
    }

    private function getDatabaseLessons(): array
    {
        return [
            [
                'name' => 'Введение в SQL',
                'description' => 'Основные команды SELECT, WHERE, ORDER BY.',
                'hours' => 2.0,
            ],
            [
                'name' => 'JOIN операции',
                'description' => 'INNER JOIN, LEFT JOIN, сложные запросы.',
                'hours' => 3.0,
            ],
            [
                'name' => 'Нормализация баз данных',
                'description' => 'Нормальные формы, проектирование схемы.',
                'hours' => 2.5,
            ],
            [
                'name' => 'Индексы и оптимизация',
                'description' => 'Создание индексов, анализ запросов.',
                'hours' => 2.0,
            ],
        ];
    }

    // Аналогичные методы для других курсов...
    private function getFlutterLessons(): array
    {
        return [
            ['name' => 'Введение в Dart', 'description' => 'Основы языка Dart', 'hours' => 2.0],
            ['name' => 'Виджеты Flutter', 'description' => 'Stateless и Stateful виджеты', 'hours' => 3.0],
            ['name' => 'Навигация', 'description' => 'Маршрутизация в приложении', 'hours' => 2.5],
        ];
    }

    private function getDevOpsLessons(): array
    {
        return [
            ['name' => 'Введение в Docker', 'description' => 'Контейнеризация приложений', 'hours' => 2.5],
            ['name' => 'Docker Compose', 'description' => 'Оркестрация контейнеров', 'hours' => 2.0],
            ['name' => 'CI/CD пайплайны', 'description' => 'Автоматизация развертывания', 'hours' => 3.0],
        ];
    }

    private function getMachineLearningLessons(): array
    {
        return [
            ['name' => 'Введение в ML', 'description' => 'Основные понятия и задачи', 'hours' => 2.5],
            ['name' => 'Классификация', 'description' => 'Алгоритмы классификации', 'hours' => 3.5],
            ['name' => 'Регрессия', 'description' => 'Линейная и логистическая регрессия', 'hours' => 3.0],
        ];
    }

    private function getSecurityLessons(): array
    {
        return [
            ['name' => 'Основы безопасности', 'description' => 'Угрозы и уязвимости', 'hours' => 2.0],
            ['name' => 'Криптография', 'description' => 'Шифрование и хэширование', 'hours' => 2.5],
            ['name' => 'Защита веб-приложений', 'description' => 'OWASP Top 10', 'hours' => 3.0],
        ];
    }

    private function getUnityLessons(): array
    {
        return [
            ['name' => 'Интерфейс Unity', 'description' => 'Окна и инструменты', 'hours' => 2.0],
            ['name' => 'Создание сцены', 'description' => 'Объекты и компоненты', 'hours' => 2.5],
            ['name' => 'Программирование на C#', 'description' => 'Скрипты и взаимодействие', 'hours' => 3.0],
        ];
    }

    private function getDefaultLessons(): array
    {
        return [
            [
                'name' => 'Введение в курс',
                'description' => 'Обзор программы и требований',
                'hours' => 1.5,
            ],
            [
                'name' => 'Основная тема 1',
                'description' => 'Изучение первой ключевой темы курса',
                'hours' => 2.5,
            ],
            [
                'name' => 'Основная тема 2',
                'description' => 'Продолжение изучения материала',
                'hours' => 2.5,
            ],
        ];
    }
}