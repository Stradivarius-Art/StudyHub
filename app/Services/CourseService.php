<?php

namespace App\Services;

use App\Contracts\CourseInterface;
use App\Enums\PaymentStatus;
use App\Http\Resources\Course\CourseResponse;
use App\Http\Resources\Course\LessonResponse;
use App\Models\Course;
use App\Models\Order;
use App\Traits\GenerateOrderId;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class CourseService implements CourseInterface
{
    use GenerateOrderId;

    public function index(): JsonResponse
    {
        $courses = Course::query()
            ->orderByDesc("created_at")
            ->paginate(5);

        $coursesData = CourseResponse::collection($courses->items());

        return response()->json([
            'data' => $coursesData,
            'pagination' => [
                'total' => $courses->lastPage(),
                'current' => $courses->currentPage(),
                'per_page' => $courses->perPage(),
            ]
        ]);
    }

    public function lessonShow(Course $course): JsonResponse
    {
        $course = $course->load('lessons');
        $lessons = LessonResponse::collection($course->lessons);

        return response()->json(['data' => $lessons]);
    }

    public function buyCourse(int $courseId): JsonResponse
    {
        $course = Course::findOrFail($courseId);

        $now = Carbon::now();
        $startDate = Carbon::parse($course->start_date);
        $endDate = Carbon::parse($course->end_date);

        if ($now->greaterThanOrEqualTo($startDate) && $now->greaterThan($endDate)) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => [
                    'course' => ['Нельзя записаться на курс, который уже начался или закончился']
                ]
            ], 422);
        }

        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'course_id' => $course->id,
            'order_id' => $this->generateOrderId(),
            'payment_status' => PaymentStatus::PENDING->value,
            'amount' => $course->price
        ]);

        $paymentUrl = $this->getPaymentUrl($order);

        return response()->json([
            'payment_url' => $paymentUrl
        ], 200);
    }

    private function getPaymentUrl(Order $order)
    {
        $baseUrl = config('app.url');
        $webhookUrl = route('payment.webhook');
        return "{$baseUrl}/payment-mock?order_id={$order->order_id}&webhook={$webhookUrl}";
    }
}