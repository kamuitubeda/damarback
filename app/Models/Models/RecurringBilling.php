<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringBilling extends Model
{
    use HasFactory;

    protected $table = 'recurring_billing';
    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function billing() {
        return $this->belongsTo(Billing::class);
    }
}
