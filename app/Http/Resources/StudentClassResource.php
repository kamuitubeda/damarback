<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentClassResource extends JsonResource
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
            'student_id' => $this->student_id,
            'classroom_id' => $this->classroom_id,
            'year_id' => $this->year_id,
            'entry_date' => $this->entry_date,
            'exit_date' => $this->exit_date,
            // Add other attributes as needed
        ];
    }
}
