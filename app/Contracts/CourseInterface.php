<?php

namespace App\Contracts;

use App\Models\Course;
use Illuminate\Http\JsonResponse;

interface CourseInterface
{
    public function index(): JsonResponse;
    public function lessonShow(Course $course): JsonResponse;
    public function buyCourse(int $courseId): JsonResponse;
}