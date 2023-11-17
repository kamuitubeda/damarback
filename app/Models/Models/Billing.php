<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billing';
    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function discount() {
        return $this->belongsTo(Discount::class);
    }

    public function recurringBilling() {
        return $this->hasOne(RecurringBilling::class);
    }
}
