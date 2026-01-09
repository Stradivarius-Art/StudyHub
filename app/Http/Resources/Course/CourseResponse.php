<?php

namespace App\Http\Resources\Course;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Course
 */
class CourseResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'video_link' => $this->video_link,
            'hours' => $this->hours,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'price' => number_format($this->price, 2, '.', '')
        ];
    }
}