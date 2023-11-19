<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecurringBillingResource extends JsonResource
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
            'billing_id' => $this->billing_id,
            'frequency' => $this->frequency,
            'next_billing_date' => $this->next_billing_date,
            // Add other attributes as needed
        ];
    }
}
