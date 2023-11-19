<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingResource extends JsonResource
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
            'payment_id' => $this->payment_id,
            'discount_id' => $this->discount_id,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_status' => $this->payment_status,
            // Add other attributes as needed
        ];
    }
}
