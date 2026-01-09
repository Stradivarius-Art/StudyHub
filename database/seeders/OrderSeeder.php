<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Order;
use App\Enums\PaymentStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем всех пользователей (кроме администратора)
        $users = User::where('email', '!=', 'admin@edu.com')->get();

        // Получаем все курсы
        $courses = Course::all();

        $createdCount = 0;

        // Создаем заказы для каждого пользователя
        foreach ($users as $user) {
            // Каждый пользователь покупает от 1 до 3 курсов
            $numberOfCourses = rand(1, min(3, $courses->count()));
            $coursesToBuy = $courses->random($numberOfCourses);

            foreach ($coursesToBuy as $course) {
                // Генерируем случайный статус (70% - success, 20% - pending, 10% - failed)
                $rand = rand(1, 100);
                if ($rand <= 70) {
                    $paymentStatus = PaymentStatus::SUCCESS;
                } elseif ($rand <= 90) {
                    $paymentStatus = PaymentStatus::PENDING;
                } else {
                    $paymentStatus = PaymentStatus::FAILED;
                }

                Order::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'order_id' => 'ORD-' . strtoupper(Str::random(10)),
                    'payment_status' => $paymentStatus,
                    'amount' => $course->price,
                ]);

                $createdCount++;
            }
        }

        $this->command->info("Создано {$createdCount} заказов для {$users->count()} пользователей");
    }
}