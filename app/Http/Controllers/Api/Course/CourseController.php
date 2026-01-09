<?php

namespace App\Http\Controllers\Api\Course;

use App\Contracts\CourseInterface;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function __construct(
        private readonly CourseInterface $service
    ) {}

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

    public function lessonShow(Course $course): JsonResponse
    {
        return $this->service->lessonShow($course);
    }

    public function buy(Course $course): JsonResponse
    {
        return $this->service->buyCourse($course->id);
    }
}