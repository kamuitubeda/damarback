<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'admin_id' => $this->admin_id,
            'payment_type' => $this->payment_type,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'confirmation_status' => $this->confirmation_status,
            // Add other attributes as needed
        ];
    }
}
