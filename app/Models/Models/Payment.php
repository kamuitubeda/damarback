<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function admin() {
        return $this->belongsTo(Teacher::class, 'admin_id');
    }

    public function billing() {
        return $this->hasOne(Billing::class);
    }
}
